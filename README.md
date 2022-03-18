# build image docker
docker build -t memory-docker-build .
# run docker image
docker run -d -p 8080:80 memory-docker-build