# pull official base image
FROM node:18.15.0-alpine
# set working directory
WORKDIR /app

# copy app files
COPY /frontend/app .


#RUN ls -la
# install app dependencies
COPY frontend/app/package.json ./
#COPY frontend/app/package-lock.json ./


RUN npm install
RUN npm run build

# add `/app/node_modules/.bin` to $PATH
ENV PATH /app/node_modules/.bin:$PATH

EXPOSE 3000
# start app
CMD ["npm", "start"]