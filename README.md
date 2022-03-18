# Jeux de memory
Création d'un jeux de memory avec une partie frontend - HTML/CSS/JS (avec librairie JQuery).   
Création d'une partie backend - PHP7/8    
Utilisation d'ajax pour synchroniser le back et le front.

# docker-compose
docker-compose up --build
# build image docker
docker build -t memory-docker-build .
# run docker image
docker run -d -p 8080:80 memory-docker-build