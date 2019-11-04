#!/bin/bash

echo Atualizando repositórios..

git init
git add .
git commit -m "v1 commit"
git push heroku master

