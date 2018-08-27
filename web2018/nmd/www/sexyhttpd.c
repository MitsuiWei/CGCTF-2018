#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>
#include <fcntl.h>
#include <time.h>
#include <signal.h>
#include <arpa/inet.h>
#include <netinet/in.h>
#include <sys/types.h>
#include <sys/prctl.h>
#include <sys/socket.h>
#include <sys/stat.h>


#define PORT 8000
#define ROOT "."
#define INDEX "index.html"
#define VERSION "sexyhttpd/0.0.1"


char path[128] = ROOT;
int server_fd, client_fd;
struct sockaddr_in server_addr, client_addr;

const char *response = (
    "HTTP/1.1 200 OK\r\n"
    "Server: " VERSION "\r\n"
    "Content-Length: %d\r\n"
    "\r\n%s"
);

const char *not_found = (
    "<title>404 Not Found</title>"
    "<center><h1>404 Not Found</h1></center>"
    "<hr><center>" VERSION "</center>"
);

void log_request() {
    time_t t = time(NULL);
    struct tm tm = *localtime(&t);
    char ip[INET_ADDRSTRLEN] = "client";
    inet_ntop(AF_INET, &client_addr.sin_addr.s_addr, ip, sizeof(ip));
    fprintf(stderr, "[%d-%d-%d %d:%d:%d] %s GET %s\n", tm.tm_year + 1900, tm.tm_mon + 1, tm.tm_mday, tm.tm_hour, tm.tm_min, tm.tm_sec, ip, path);
}

void read_path() {
    
    char buffer[256];
    int fd, size;
    struct stat st;

    if(path[strlen(path) - 1] == '/') {
        memcpy(path + strlen(path), INDEX, sizeof(INDEX));
    }
    
    log_request();

    stat(path, &st);

    if(S_ISREG(st.st_mode) && (fd = open(path, O_RDONLY)) != -1) {
        dprintf(client_fd, response, st.st_size, "");

        while((size = read(fd, buffer, 256)) > 0) {
            write(client_fd, buffer, size);
        }

    } else {
        dprintf(client_fd, response, strlen(not_found), not_found);
    }
    
}


void handle_request() {
    char header[256];

    while(read(client_fd, header, 512) > 0) {

        if(sscanf(header, "GET %s HTTP/1.1", path + strlen(ROOT)) != EOF) {
            if(strlen(path + strlen(ROOT)) > 0) {
                read_path();
            }
        }

        memset(header, 0, sizeof(header));
        memset(path + strlen(ROOT), 0, sizeof(path) - strlen(ROOT));
    }

    close(client_fd);
    
}


int main() {
    server_fd = socket(AF_INET, SOCK_STREAM, 0);

    bzero(&server_addr, sizeof(server_addr));
    server_addr.sin_family = PF_INET;
    server_addr.sin_addr.s_addr = INADDR_ANY;
    server_addr.sin_port = htons(PORT);
    
    int ret, flag = 1;

    ret = setsockopt(server_fd, SOL_SOCKET, SO_REUSEADDR, &flag, sizeof(int));
    if(ret < 0) {
        perror("Failed to set socket option.\n");
        exit(1);
    }

    ret = bind(server_fd, (struct sockaddr *) &server_addr, sizeof(server_addr));
    if(ret < 0) {
        perror("Failed to bind address.\n");
        exit(1);
    }

    fprintf(stderr, "Bind to port %d.\n", PORT);
    
    ret = listen(server_fd, 64);
    if(ret < 0) {
        perror("Failed to listen.\n");
        exit(1);
    }

    perror("Listening, input `q` to quit.");
    
    socklen_t addrlen = sizeof(client_addr);
    
    if(fork() == 0) {
        prctl(PR_SET_PDEATHSIG, SIGKILL);
        while(1) {
            client_fd = accept(server_fd, (struct sockaddr*) &client_addr, &addrlen);
            
            if(fork() == 0) {
                prctl(PR_SET_PDEATHSIG, SIGKILL);
                handle_request();
            }
        }
    }
    
    while(getchar() != 'q');
}
