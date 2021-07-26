#!/bin/bash

docker build -t cmdline-fun . && \
docker run -it -p 2022:2022 --rm --name cmdline-fun-container cmdline-fun
