FROM postgres:9.6

RUN localedef -i ja_JP -c -f UTF-8 -A /usr/share/locale/locale.alias ja_JP.UTF-8

ENV LANG ja_JP.UTF-8

COPY *.sql /docker-entrypoint-initdb.d/

EXPOSE 5432

USER postgres

RUN /etc/init.d/postgresql restart

# docker create network devnw
# docker run --net devnw -d -p 5432:5432 --name postgres todo/postgres
