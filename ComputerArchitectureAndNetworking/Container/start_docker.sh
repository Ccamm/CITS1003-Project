#!/bin/bash

docker build -t architecturenetwork-challenges . && \
docker run -it -p 2022:2022 --rm --name architecturenetwork-challenges-container architecturenetwork-challenges
