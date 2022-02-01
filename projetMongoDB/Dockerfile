FROM node:lts
WORKDIR /usr/src/app

#RUN bash -c ls

#ENTRYPOINT ["bash", "-c", "ls"]

#COPY ["/src/api/package.json", "/src/api"]
RUN npm install
COPY . .
RUN "bash -c ls && npm start"
#CMD ["npm", "start"]