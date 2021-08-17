#!/bin/bash

docker build -t super-quiet-library-1000 . && \
docker run -it -p 1000:1000 --rm --name super-quiet-library-container super-quiet-library-1000
