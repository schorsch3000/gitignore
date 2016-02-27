FROM debian:stable
RUN apt-get update && apt-get upgrade
RUN apt-get install -y build-essential ca-certificates php5-cli
WORKDIR /WORK
