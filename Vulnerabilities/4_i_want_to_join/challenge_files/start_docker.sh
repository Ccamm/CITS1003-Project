#!/bin/bash

docker build -t i-want-to-join . && \
docker run -it -p 1337:1337 --rm --name i-want-to-join-container i-want-to-join
