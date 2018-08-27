FROM alpine
ADD server /root/server
RUN mv /root/server/git /root/server/.git
ADD flag1 /root/flag1
ADD flag2 /root/THIS_IS_THE_SECOND_FLAG_CONGRATS
WORKDIR /root/server/
CMD ./server.out
