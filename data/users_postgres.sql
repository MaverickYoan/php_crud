-- Table: public.users_postgres

-- DROP TABLE IF EXISTS public.users_postgres;

CREATE TABLE IF NOT EXISTS public.users_postgres
(
    id integer NOT NULL,
    "firstName" character(255) COLLATE pg_catalog."default",
    "lastName" character(255) COLLATE pg_catalog."default",
    infos character(255) COLLATE pg_catalog."default",
    CONSTRAINT users_postgres_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.users_postgres
    OWNER to test;

COMMENT ON TABLE public.users_postgres
    IS 'première base de données SQL users_postgres';

    GRANT ALL(id) ON public.users_postgres TO PUBLIC;