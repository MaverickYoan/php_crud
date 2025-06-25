-- Table: public.editeurs

-- DROP TABLE IF EXISTS public.editeurs;

CREATE TABLE IF NOT EXISTS public.editeurs
(
    id integer NOT NULL DEFAULT nextval('editeurs_id_seq'::regclass),
    nom character varying(255) COLLATE pg_catalog."default" NOT NULL,
    pays character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT editeurs_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.editeurs
    OWNER to test;