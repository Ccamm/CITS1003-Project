#!/bin/bash

docker build -t super-quiet-library . && \
docker run -it -p 1337:1337 --rm --name super-quiet-library-container super-quiet-library
