--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5
-- Dumped by pg_dump version 13.3

-- Started on 2022-03-02 21:28:38

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 5 (class 2615 OID 27854)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 3161 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 202 (class 1259 OID 27855)
-- Name: article_packages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.article_packages (
    id bigint NOT NULL,
    qte_article integer,
    prix_unitaire_package integer,
    article_id integer NOT NULL,
    package_id integer NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.article_packages OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 27858)
-- Name: article_packages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.article_packages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.article_packages_id_seq OWNER TO postgres;

--
-- TOC entry 3162 (class 0 OID 0)
-- Dependencies: 203
-- Name: article_packages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.article_packages_id_seq OWNED BY public.article_packages.id;


--
-- TOC entry 204 (class 1259 OID 27860)
-- Name: articles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.articles (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    description character varying(200),
    article_photo character varying(200),
    qte_en_stock integer DEFAULT 0 NOT NULL,
    qte_stocker integer DEFAULT 0 NOT NULL,
    prix_tarification double precision DEFAULT '0'::double precision NOT NULL,
    user_id integer NOT NULL,
    type_article_id integer,
    remarque_id integer,
    categorie_id integer,
    tarification_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.articles OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 27869)
-- Name: articles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.articles_id_seq OWNER TO postgres;

--
-- TOC entry 3163 (class 0 OID 0)
-- Dependencies: 205
-- Name: articles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.articles_id_seq OWNED BY public.articles.id;


--
-- TOC entry 206 (class 1259 OID 27871)
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    description character varying(200),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 27877)
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO postgres;

--
-- TOC entry 3164 (class 0 OID 0)
-- Dependencies: 207
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- TOC entry 208 (class 1259 OID 27879)
-- Name: clients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clients (
    id bigint NOT NULL,
    code character varying(200),
    nom character varying(200) NOT NULL,
    contact1 character varying(200),
    contact2 character varying(200),
    adresse character varying(200),
    user_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.clients OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 27885)
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.clients_id_seq OWNER TO postgres;

--
-- TOC entry 3165 (class 0 OID 0)
-- Dependencies: 209
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clients_id_seq OWNED BY public.clients.id;


--
-- TOC entry 210 (class 1259 OID 27887)
-- Name: destockages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.destockages (
    id bigint NOT NULL,
    code character varying(200),
    qte integer DEFAULT 0 NOT NULL,
    motif character varying(200),
    article_id integer NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.destockages OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 27891)
-- Name: destockages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.destockages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.destockages_id_seq OWNER TO postgres;

--
-- TOC entry 3166 (class 0 OID 0)
-- Dependencies: 211
-- Name: destockages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.destockages_id_seq OWNED BY public.destockages.id;


--
-- TOC entry 212 (class 1259 OID 27893)
-- Name: entrers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.entrers (
    id bigint NOT NULL,
    code character varying(200),
    date_entre timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "isValidated" boolean DEFAULT false NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.entrers OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 27898)
-- Name: entrers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.entrers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.entrers_id_seq OWNER TO postgres;

--
-- TOC entry 3167 (class 0 OID 0)
-- Dependencies: 213
-- Name: entrers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.entrers_id_seq OWNED BY public.entrers.id;


--
-- TOC entry 214 (class 1259 OID 27900)
-- Name: evenements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.evenements (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    nbr_personne integer,
    montant_total integer,
    reste_payer integer,
    nb_jour integer,
    lieu character varying(200),
    status character varying(200),
    description character varying(200),
    caution integer,
    date_debut_evenement timestamp(0) without time zone,
    date_fin_evenement timestamp(0) without time zone NOT NULL,
    type_evenement_id integer,
    client_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    percentage_caution double precision DEFAULT '20'::double precision NOT NULL,
    remise double precision
);


ALTER TABLE public.evenements OWNER TO postgres;

--
-- TOC entry 3168 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN evenements.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.evenements.status IS 'A venir, En Cours, Terminé, Cloturé, À Confirmer';


--
-- TOC entry 215 (class 1259 OID 27907)
-- Name: evenements_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evenements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evenements_id_seq OWNER TO postgres;

--
-- TOC entry 3169 (class 0 OID 0)
-- Dependencies: 215
-- Name: evenements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evenements_id_seq OWNED BY public.evenements.id;


--
-- TOC entry 216 (class 1259 OID 27909)
-- Name: factures; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.factures (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    date_creation date NOT NULL,
    caution integer,
    user_id integer NOT NULL,
    evenement_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.factures OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 27912)
-- Name: factures_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.factures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factures_id_seq OWNER TO postgres;

--
-- TOC entry 3170 (class 0 OID 0)
-- Dependencies: 217
-- Name: factures_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.factures_id_seq OWNED BY public.factures.id;


--
-- TOC entry 218 (class 1259 OID 27914)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 27921)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 3171 (class 0 OID 0)
-- Dependencies: 219
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 220 (class 1259 OID 27923)
-- Name: fournisseurs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fournisseurs (
    id bigint NOT NULL,
    code character varying(200),
    nom character varying(200) NOT NULL,
    contact character varying(200),
    adresse character varying(200),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.fournisseurs OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 27929)
-- Name: fournisseurs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fournisseurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fournisseurs_id_seq OWNER TO postgres;

--
-- TOC entry 3172 (class 0 OID 0)
-- Dependencies: 221
-- Name: fournisseurs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fournisseurs_id_seq OWNED BY public.fournisseurs.id;


--
-- TOC entry 222 (class 1259 OID 27931)
-- Name: ligne_entrers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ligne_entrers (
    id bigint NOT NULL,
    article_id integer NOT NULL,
    entrer_id integer NOT NULL,
    qte integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.ligne_entrers OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 27935)
-- Name: ligne_entrers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ligne_entrers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ligne_entrers_id_seq OWNER TO postgres;

--
-- TOC entry 3173 (class 0 OID 0)
-- Dependencies: 223
-- Name: ligne_entrers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ligne_entrers_id_seq OWNED BY public.ligne_entrers.id;


--
-- TOC entry 224 (class 1259 OID 27937)
-- Name: locations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.locations (
    id bigint NOT NULL,
    qte_loue integer NOT NULL,
    qte_retour integer,
    nb_jour integer DEFAULT 1 NOT NULL,
    total_une_ligne integer DEFAULT 0 NOT NULL,
    status character varying(200) DEFAULT 'Enregistré'::character varying NOT NULL,
    etat_article character varying(200) DEFAULT 'BON ETAT'::character varying,
    date_location timestamp(0) without time zone,
    date_retour timestamp(0) without time zone,
    user_id integer NOT NULL,
    article_id integer NOT NULL,
    evenement_id integer NOT NULL,
    client_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.locations OWNER TO postgres;

--
-- TOC entry 3174 (class 0 OID 0)
-- Dependencies: 224
-- Name: COLUMN locations.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.locations.status IS '0:Enregistré, 1:En Cours, 2:Terminé';


--
-- TOC entry 225 (class 1259 OID 27944)
-- Name: locations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.locations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.locations_id_seq OWNER TO postgres;

--
-- TOC entry 3175 (class 0 OID 0)
-- Dependencies: 225
-- Name: locations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.locations_id_seq OWNED BY public.locations.id;


--
-- TOC entry 226 (class 1259 OID 27946)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(200) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 27949)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 3176 (class 0 OID 0)
-- Dependencies: 227
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 228 (class 1259 OID 27951)
-- Name: model_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(200) NOT NULL,
    model_id bigint NOT NULL
);


ALTER TABLE public.model_has_permissions OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 27954)
-- Name: model_has_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(200) NOT NULL,
    model_id bigint NOT NULL
);


ALTER TABLE public.model_has_roles OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 27957)
-- Name: packages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.packages (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    description character varying(200),
    nbr_personnes character varying(200),
    caution character varying(200),
    caution_saisie character varying(200),
    prix_location character varying(200),
    categorie_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.packages OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 27963)
-- Name: packages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.packages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.packages_id_seq OWNER TO postgres;

--
-- TOC entry 3177 (class 0 OID 0)
-- Dependencies: 231
-- Name: packages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.packages_id_seq OWNED BY public.packages.id;


--
-- TOC entry 232 (class 1259 OID 27965)
-- Name: parametrages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parametrages (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200),
    content character varying(200),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.parametrages OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 27971)
-- Name: parametrages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.parametrages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parametrages_id_seq OWNER TO postgres;

--
-- TOC entry 3178 (class 0 OID 0)
-- Dependencies: 233
-- Name: parametrages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.parametrages_id_seq OWNED BY public.parametrages.id;


--
-- TOC entry 234 (class 1259 OID 27973)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(200) NOT NULL,
    token character varying(200) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 27976)
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(200) NOT NULL,
    guard_name character varying(200) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 27979)
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_seq OWNER TO postgres;

--
-- TOC entry 3179 (class 0 OID 0)
-- Dependencies: 236
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- TOC entry 237 (class 1259 OID 27981)
-- Name: reglements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reglements (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    montant double precision NOT NULL,
    date_reglement date NOT NULL,
    description character varying(200),
    user_id integer NOT NULL,
    facture_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.reglements OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 27987)
-- Name: reglements_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reglements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reglements_id_seq OWNER TO postgres;

--
-- TOC entry 3180 (class 0 OID 0)
-- Dependencies: 238
-- Name: reglements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reglements_id_seq OWNED BY public.reglements.id;


--
-- TOC entry 239 (class 1259 OID 27989)
-- Name: remarques; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.remarques (
    id bigint NOT NULL,
    titre character varying(200) NOT NULL,
    contenu character varying(200) NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.remarques OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 27992)
-- Name: remarques_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.remarques_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.remarques_id_seq OWNER TO postgres;

--
-- TOC entry 3181 (class 0 OID 0)
-- Dependencies: 240
-- Name: remarques_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.remarques_id_seq OWNED BY public.remarques.id;


--
-- TOC entry 241 (class 1259 OID 27994)
-- Name: role_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);


ALTER TABLE public.role_has_permissions OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 27997)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(200) NOT NULL,
    guard_name character varying(200) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 28000)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- TOC entry 3182 (class 0 OID 0)
-- Dependencies: 243
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- TOC entry 244 (class 1259 OID 28002)
-- Name: tarifications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tarifications (
    id bigint NOT NULL,
    prix integer DEFAULT 0 NOT NULL,
    categorie_article_id integer NOT NULL,
    type_article_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tarifications OWNER TO postgres;

--
-- TOC entry 245 (class 1259 OID 28006)
-- Name: tarifications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tarifications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tarifications_id_seq OWNER TO postgres;

--
-- TOC entry 3183 (class 0 OID 0)
-- Dependencies: 245
-- Name: tarifications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tarifications_id_seq OWNED BY public.tarifications.id;


--
-- TOC entry 246 (class 1259 OID 28008)
-- Name: type_articles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.type_articles (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    description character varying(200),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.type_articles OWNER TO postgres;

--
-- TOC entry 247 (class 1259 OID 28014)
-- Name: type_articles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.type_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.type_articles_id_seq OWNER TO postgres;

--
-- TOC entry 3184 (class 0 OID 0)
-- Dependencies: 247
-- Name: type_articles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.type_articles_id_seq OWNED BY public.type_articles.id;


--
-- TOC entry 248 (class 1259 OID 28016)
-- Name: type_evenements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.type_evenements (
    id bigint NOT NULL,
    code character varying(200),
    libelle character varying(200) NOT NULL,
    description character varying(200),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.type_evenements OWNER TO postgres;

--
-- TOC entry 249 (class 1259 OID 28022)
-- Name: type_evenements_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.type_evenements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.type_evenements_id_seq OWNER TO postgres;

--
-- TOC entry 3185 (class 0 OID 0)
-- Dependencies: 249
-- Name: type_evenements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.type_evenements_id_seq OWNED BY public.type_evenements.id;


--
-- TOC entry 250 (class 1259 OID 28024)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    login character varying(200) NOT NULL,
    nom character varying(200),
    tel1 character varying(200),
    tel2 character varying(200),
    genre character varying(200) DEFAULT 'Mme'::character varying NOT NULL,
    password character varying(200) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 251 (class 1259 OID 28032)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3186 (class 0 OID 0)
-- Dependencies: 251
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 2847 (class 2604 OID 28034)
-- Name: article_packages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article_packages ALTER COLUMN id SET DEFAULT nextval('public.article_packages_id_seq'::regclass);


--
-- TOC entry 2851 (class 2604 OID 28035)
-- Name: articles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles ALTER COLUMN id SET DEFAULT nextval('public.articles_id_seq'::regclass);


--
-- TOC entry 2852 (class 2604 OID 28036)
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- TOC entry 2853 (class 2604 OID 28037)
-- Name: clients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients ALTER COLUMN id SET DEFAULT nextval('public.clients_id_seq'::regclass);


--
-- TOC entry 2855 (class 2604 OID 28038)
-- Name: destockages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.destockages ALTER COLUMN id SET DEFAULT nextval('public.destockages_id_seq'::regclass);


--
-- TOC entry 2858 (class 2604 OID 28039)
-- Name: entrers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entrers ALTER COLUMN id SET DEFAULT nextval('public.entrers_id_seq'::regclass);


--
-- TOC entry 2860 (class 2604 OID 28040)
-- Name: evenements id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evenements ALTER COLUMN id SET DEFAULT nextval('public.evenements_id_seq'::regclass);


--
-- TOC entry 2861 (class 2604 OID 28041)
-- Name: factures id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factures ALTER COLUMN id SET DEFAULT nextval('public.factures_id_seq'::regclass);


--
-- TOC entry 2863 (class 2604 OID 28042)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 2864 (class 2604 OID 28043)
-- Name: fournisseurs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fournisseurs ALTER COLUMN id SET DEFAULT nextval('public.fournisseurs_id_seq'::regclass);


--
-- TOC entry 2866 (class 2604 OID 28044)
-- Name: ligne_entrers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ligne_entrers ALTER COLUMN id SET DEFAULT nextval('public.ligne_entrers_id_seq'::regclass);


--
-- TOC entry 2871 (class 2604 OID 28045)
-- Name: locations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locations ALTER COLUMN id SET DEFAULT nextval('public.locations_id_seq'::regclass);


--
-- TOC entry 2872 (class 2604 OID 28046)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2873 (class 2604 OID 28047)
-- Name: packages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.packages ALTER COLUMN id SET DEFAULT nextval('public.packages_id_seq'::regclass);


--
-- TOC entry 2874 (class 2604 OID 28048)
-- Name: parametrages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parametrages ALTER COLUMN id SET DEFAULT nextval('public.parametrages_id_seq'::regclass);


--
-- TOC entry 2875 (class 2604 OID 28049)
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- TOC entry 2876 (class 2604 OID 28050)
-- Name: reglements id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reglements ALTER COLUMN id SET DEFAULT nextval('public.reglements_id_seq'::regclass);


--
-- TOC entry 2877 (class 2604 OID 28051)
-- Name: remarques id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.remarques ALTER COLUMN id SET DEFAULT nextval('public.remarques_id_seq'::regclass);


--
-- TOC entry 2878 (class 2604 OID 28052)
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- TOC entry 2880 (class 2604 OID 28053)
-- Name: tarifications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarifications ALTER COLUMN id SET DEFAULT nextval('public.tarifications_id_seq'::regclass);


--
-- TOC entry 2881 (class 2604 OID 28054)
-- Name: type_articles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.type_articles ALTER COLUMN id SET DEFAULT nextval('public.type_articles_id_seq'::regclass);


--
-- TOC entry 2882 (class 2604 OID 28055)
-- Name: type_evenements id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.type_evenements ALTER COLUMN id SET DEFAULT nextval('public.type_evenements_id_seq'::regclass);


--
-- TOC entry 2885 (class 2604 OID 28056)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3106 (class 0 OID 27855)
-- Dependencies: 202
-- Data for Name: article_packages; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3108 (class 0 OID 27860)
-- Dependencies: 204
-- Data for Name: articles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.articles VALUES (48, '20210921048', 'Rose Gold Plate', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:59:12', '2021-10-30 15:27:26');
INSERT INTO public.articles VALUES (43, '20210921043', 'Cendrillon Blanc Plate', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:41:28', '2021-10-25 16:20:38');
INSERT INTO public.articles VALUES (13, '20210921013', 'Fourchette dorée', NULL, NULL, 221, 221, 250, 3, 3, NULL, 2, NULL, '2021-09-21 20:41:25', '2021-10-23 23:07:23');
INSERT INTO public.articles VALUES (3, '2021092103', 'Chaise Chiavari Blanche', NULL, NULL, 475, 475, 1000, 3, 4, NULL, 2, NULL, '2021-09-21 09:48:14', '2021-10-26 16:04:14');
INSERT INTO public.articles VALUES (7, '2021092107', 'Fourchette Point', NULL, NULL, 90, 90, 200, 3, 3, NULL, 1, NULL, '2021-09-21 20:33:07', '2021-10-23 23:02:15');
INSERT INTO public.articles VALUES (2, '2021092102', 'Chaise Chiavari Dorée', NULL, NULL, 8, 588, 1500, 3, 4, NULL, 2, NULL, '2021-09-21 09:46:51', '2021-12-01 10:13:05');
INSERT INTO public.articles VALUES (45, '20210921045', 'Vert Gold Présentation', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:58:01', '2021-10-25 17:26:39');
INSERT INTO public.articles VALUES (19, '20210921019', 'Cuillère doré 4 traits', NULL, NULL, 48, 48, 1000, 3, 3, NULL, 3, 9, '2021-09-21 21:13:12', '2021-10-23 23:10:37');
INSERT INTO public.articles VALUES (62, '20210929062', 'Unique creuse', NULL, NULL, 0, 0, 100, 3, 18, NULL, 1, 52, '2021-09-29 21:44:14', '2021-10-23 23:42:41');
INSERT INTO public.articles VALUES (26, '20210921026', 'couteau noir', NULL, NULL, 0, 0, 1000, 3, 3, NULL, 3, NULL, '2021-09-21 21:26:16', '2021-10-23 23:38:24');
INSERT INTO public.articles VALUES (55, '20210921055', 'Rouge Gold Plate', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:03:23', '2021-10-23 23:59:23');
INSERT INTO public.articles VALUES (14, '20210921014', 'Couteau doré', NULL, NULL, 222, 222, 250, 3, 3, NULL, 2, NULL, '2021-09-21 20:41:50', '2021-10-23 23:07:54');
INSERT INTO public.articles VALUES (50, '20210921050', 'Orange Gold Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:01:01', '2021-10-30 15:22:04');
INSERT INTO public.articles VALUES (16, '20210921016', 'Fourchette américaine', NULL, NULL, 90, 90, 350, 3, 3, NULL, 2, NULL, '2021-09-21 21:06:34', '2021-10-23 23:33:57');
INSERT INTO public.articles VALUES (28, '20210921028', 'Classique Creuse', NULL, NULL, 0, 0, 200, 3, 18, NULL, 1, 52, '2021-09-21 21:27:55', '2021-10-11 12:04:38');
INSERT INTO public.articles VALUES (25, '20210921025', 'petite cuillère vieux paris', NULL, NULL, 27, 27, 1000, 3, 3, NULL, 2, NULL, '2021-09-21 21:25:35', '2021-10-23 23:24:13');
INSERT INTO public.articles VALUES (17, '20210921017', 'Couteau américaine', NULL, NULL, 100, 100, 350, 3, 3, NULL, 2, NULL, '2021-09-21 21:06:58', '2021-10-23 23:37:58');
INSERT INTO public.articles VALUES (20, '20210921020', 'Petite cuillère dorée', NULL, NULL, 204, 204, 250, 3, 3, NULL, 2, NULL, '2021-09-21 21:22:08', '2021-10-23 23:11:26');
INSERT INTO public.articles VALUES (18, '20210921018', 'Cuillère Willmax', NULL, NULL, 195, 195, 350, 3, 3, NULL, 2, NULL, '2021-09-21 21:07:23', '2021-10-23 23:10:04');
INSERT INTO public.articles VALUES (21, '20210921021', 'Plus petite cuillère dorée', NULL, NULL, 23, 23, 250, 3, 3, NULL, 2, NULL, '2021-09-21 21:22:34', '2021-10-23 23:12:14');
INSERT INTO public.articles VALUES (23, '20210921023', 'fourchette vieux paris', NULL, NULL, 143, 143, 1000, 3, 3, NULL, 3, NULL, '2021-09-21 21:24:21', '2021-10-25 17:49:01');
INSERT INTO public.articles VALUES (32, '20210921032', 'Graal Présentation', NULL, NULL, 0, 0, 1000, 3, 18, NULL, 3, 53, '2021-09-21 21:33:29', '2021-10-25 17:52:02');
INSERT INTO public.articles VALUES (24, '20210921024', 'couteau vieux  paris', NULL, NULL, 53, 53, 1000, 3, 3, NULL, 2, NULL, '2021-09-21 21:24:55', '2021-10-23 23:22:58');
INSERT INTO public.articles VALUES (12, '20210921012', 'Cuillère dorée', NULL, NULL, 193, 193, 250, 3, 3, NULL, 2, NULL, '2021-09-21 20:40:59', '2021-10-23 23:06:49');
INSERT INTO public.articles VALUES (42, '20210921042', 'Cendrillon Blanc Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:41:11', '2021-10-25 17:48:15');
INSERT INTO public.articles VALUES (11, '20210921011', 'Couteau Trait', NULL, NULL, 270, 270, 200, 3, 3, NULL, 1, NULL, '2021-09-21 20:39:39', '2021-10-23 23:06:26');
INSERT INTO public.articles VALUES (29, '20210921029', 'Classique Plate', NULL, NULL, 0, 0, 200, 3, 18, NULL, 1, 52, '2021-09-21 21:29:46', '2021-10-11 12:04:38');
INSERT INTO public.articles VALUES (46, '20210921046', 'Vert Gold Plate', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:58:23', '2021-10-30 15:24:29');
INSERT INTO public.articles VALUES (31, '20210921031', 'Graal plate', NULL, NULL, 0, 0, 1000, 3, 18, NULL, 3, 53, '2021-09-21 21:32:56', '2021-10-25 17:53:12');
INSERT INTO public.articles VALUES (37, '20210921037', 'Muguet Bleu Creuse', NULL, NULL, 0, 0, 300, 3, 18, NULL, 1, 52, '2021-09-21 21:37:44', '2021-10-30 15:22:48');
INSERT INTO public.articles VALUES (38, '20210921038', 'Cendrillon Bleu Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, 53, '2021-09-21 21:38:39', '2021-10-11 12:04:16');
INSERT INTO public.articles VALUES (34, '20210921034', 'Muguet Blanc Plate', NULL, NULL, 0, 0, 300, 3, 18, NULL, 1, 52, '2021-09-21 21:35:03', '2021-10-30 15:23:44');
INSERT INTO public.articles VALUES (35, '20210921035', 'Muguet Blanc Creuse', NULL, NULL, 0, 0, 300, 3, 18, NULL, 1, 52, '2021-09-21 21:35:37', '2021-10-30 15:23:25');
INSERT INTO public.articles VALUES (36, '20210921036', 'Muguet Bleu Plate', NULL, NULL, 0, 0, 300, 3, 18, NULL, 1, 52, '2021-09-21 21:36:05', '2021-10-30 15:23:05');
INSERT INTO public.articles VALUES (57, '20210921057', 'N''zassa Vert Orange Plate', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:09:50', '2021-10-23 23:48:24');
INSERT INTO public.articles VALUES (40, '20210921040', 'Cendrillon Gris Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:40:24', '2021-10-23 23:41:04');
INSERT INTO public.articles VALUES (39, '20210921039', 'Cendrillon Bleu Plate', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, 53, '2021-09-21 21:40:00', '2021-10-11 12:04:16');
INSERT INTO public.articles VALUES (30, '20210921030', 'Classique dessert', NULL, NULL, 0, 0, 200, 3, 18, NULL, 1, 52, '2021-09-21 21:30:28', '2021-10-11 12:04:38');
INSERT INTO public.articles VALUES (8, '2021092108', 'Couteau Point', NULL, NULL, 94, 94, 200, 3, 3, NULL, 1, NULL, '2021-09-21 20:33:55', '2021-10-23 23:05:30');
INSERT INTO public.articles VALUES (15, '20210921015', 'Cuillère américaine', NULL, NULL, 104, 104, 350, 3, 3, NULL, 2, NULL, '2021-09-21 21:04:35', '2021-10-23 23:32:41');
INSERT INTO public.articles VALUES (9, '2021092109', 'Cuillère trait', NULL, NULL, 213, 215, 200, 3, 3, NULL, 1, NULL, '2021-09-21 20:34:14', '2021-10-23 23:00:45');
INSERT INTO public.articles VALUES (10, '20210921010', 'Fourchette Trait', NULL, NULL, 246, 246, 200, 3, 3, NULL, 1, NULL, '2021-09-21 20:36:53', '2021-10-23 23:03:06');
INSERT INTO public.articles VALUES (22, '20210921022', 'cuillère vieux paris', NULL, NULL, 135, 135, 1000, 3, 3, NULL, 3, NULL, '2021-09-21 21:23:53', '2021-10-23 23:50:55');
INSERT INTO public.articles VALUES (52, '20210921052', 'Orange Gold Présentation', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:01:34', '2021-10-30 15:25:08');
INSERT INTO public.articles VALUES (5, '2021092105', 'Chaise Champêtre Blanche', NULL, 'articles/202105_Chaise Champêtre Blanche.jpg', 578, 578, 2500, 3, 4, NULL, 2, NULL, '2021-09-21 09:49:36', '2022-02-02 15:06:45');
INSERT INTO public.articles VALUES (47, '20210921047', 'Rose Gold Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:58:42', '2021-10-30 15:28:04');
INSERT INTO public.articles VALUES (51, '20210921051', 'Orange Gold Plate', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:01:17', '2021-10-30 15:26:09');
INSERT INTO public.articles VALUES (1, '2021092101', 'Chaise Malaga', NULL, NULL, 705, 705, 300, 3, 4, NULL, 1, NULL, '2021-09-21 09:46:07', '2021-10-26 16:04:14');
INSERT INTO public.articles VALUES (49, '20210921049', 'Rose Gold Présentation', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:00:12', '2021-10-30 15:26:39');
INSERT INTO public.articles VALUES (41, '20210921041', 'Cendrillon Gris Plate', NULL, NULL, 0, 0, 500, 3, 3, NULL, 2, NULL, '2021-09-21 21:40:46', '2021-10-25 16:17:36');
INSERT INTO public.articles VALUES (54, '20210921054', 'Rouge Gold Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:03:06', '2021-10-23 23:58:43');
INSERT INTO public.articles VALUES (56, '20210921056', 'N''Zassa Vert Orange Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:09:21', '2021-10-24 00:00:25');
INSERT INTO public.articles VALUES (64, '20210929064', 'Table dorée petite C', NULL, NULL, 0, 0, 15000, 3, 6, NULL, 2, 7, '2021-09-29 21:46:47', '2021-10-25 13:53:18');
INSERT INTO public.articles VALUES (44, '20210921044', 'Vert Gold Creuse', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 21:57:43', '2021-10-25 17:43:54');
INSERT INTO public.articles VALUES (27, '20210921027', 'Fourchette Noire', NULL, NULL, 0, 0, 1000, 3, 3, NULL, 3, NULL, '2021-09-21 21:26:54', '2021-10-23 23:05:52');
INSERT INTO public.articles VALUES (53, '20210921053', 'Rouge Gold Présentation', NULL, NULL, 0, 0, 500, 3, 18, NULL, 2, NULL, '2021-09-21 22:02:51', '2021-10-25 16:15:16');
INSERT INTO public.articles VALUES (63, '20210929063', 'Table dorée grande C', NULL, NULL, 0, 0, 20000, 3, 6, NULL, 2, 17, '2021-09-29 21:46:19', '2021-10-25 14:09:40');
INSERT INTO public.articles VALUES (33, '20210921033', 'Graal Dessert', NULL, NULL, 0, 0, 1000, 3, 18, NULL, 3, 53, '2021-09-21 21:34:03', '2021-10-25 17:55:52');
INSERT INTO public.articles VALUES (6, '2021092106', 'Cuillère Point', NULL, NULL, 84, 84, 200, 3, 3, NULL, 1, NULL, '2021-09-21 20:32:27', '2021-10-23 23:01:39');
INSERT INTO public.articles VALUES (110, '202110300110', 'Piste de danse lumineuse', NULL, NULL, 0, 0, 200000, 3, 12, NULL, 3, NULL, '2021-10-30 13:16:14', '2021-10-30 13:17:29');
INSERT INTO public.articles VALUES (116, '202110300116', 'Chaise lotus', NULL, NULL, 2, 2, 7500, 3, 4, NULL, 2, NULL, '2021-10-30 13:25:35', '2021-12-06 23:27:45');
INSERT INTO public.articles VALUES (69, '20211011069', 'Cuillère Zara style carré gris', NULL, NULL, 6, 6, 1000, 3, 3, NULL, 3, 9, '2021-10-11 12:59:51', '2021-10-26 15:41:28');
INSERT INTO public.articles VALUES (105, '202110250105', 'Table Pic Nic couleur bois', NULL, NULL, 0, 0, 2000, 3, 23, NULL, 1, NULL, '2021-10-25 19:51:01', '2021-10-26 15:42:22');
INSERT INTO public.articles VALUES (106, '202110250106', 'Tapis Vert 5m\2m', NULL, NULL, 0, 0, 10000, 3, 23, NULL, 1, NULL, '2021-10-25 19:51:34', '2021-10-26 15:43:04');
INSERT INTO public.articles VALUES (4, '2021092104', 'Chaise Champêtre Dorée', NULL, 'articles/202104_Chaise Champêtre Dorée.jpg', 510, 510, 2500, 3, 4, NULL, 2, NULL, '2021-09-21 09:49:02', '2022-02-25 15:49:24');
INSERT INTO public.articles VALUES (97, '20211011097', 'Fourchette moyenne bas rond', NULL, NULL, 0, 0, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:43:31', '2021-10-23 22:30:22');
INSERT INTO public.articles VALUES (70, '20211011070', 'Couteau à poisson Zara style carré blanc', NULL, NULL, 30, 30, 1000, 3, 3, NULL, 3, 9, '2021-10-11 13:00:51', '2021-10-25 15:32:59');
INSERT INTO public.articles VALUES (72, '20211011072', 'Petite cuillère Zara style carré gris', NULL, NULL, 6, 6, 1000, 3, 3, NULL, 3, 7, '2021-10-11 13:02:14', '2021-10-25 15:34:28');
INSERT INTO public.articles VALUES (107, '202110260107', 'Table ronde en bois', NULL, NULL, 0, 0, 2500, 3, 6, NULL, 1, NULL, '2021-10-26 16:08:13', '2021-10-26 16:08:13');
INSERT INTO public.articles VALUES (71, '20211011071', 'Fourchette Zara style carré gris', NULL, NULL, 6, 6, 1000, 3, 3, NULL, 3, 9, '2021-10-11 13:01:39', '2021-10-25 15:35:48');
INSERT INTO public.articles VALUES (66, '20211011066', 'Cuillère argent doré', NULL, NULL, 6, 6, 1000, 3, 3, NULL, 3, 9, '2021-10-11 12:49:26', '2021-10-25 17:33:11');
INSERT INTO public.articles VALUES (96, '20211011096', 'Fourchette bas rond', NULL, NULL, 0, 0, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:43:05', '2021-10-23 22:30:41');
INSERT INTO public.articles VALUES (95, '20211011095', 'Cuillère bas rond', NULL, NULL, 52, 52, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:42:47', '2021-10-23 22:31:00');
INSERT INTO public.articles VALUES (85, '20211011085', 'Fourchette moyenne vieux paris', NULL, NULL, 49, 49, 1000, 3, 3, NULL, 3, 9, '2021-10-11 15:16:00', '2021-10-23 22:57:45');
INSERT INTO public.articles VALUES (94, '20211011094', 'Plus petite cuillère point', NULL, NULL, 99, 99, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:13:57', '2021-10-23 22:31:23');
INSERT INTO public.articles VALUES (103, '202110250103', 'Piste  de danse 3D', 'la grande plaque fait 1m2', NULL, 0, 0, 200000, 3, 12, NULL, 3, NULL, '2021-10-25 13:48:19', '2021-10-30 13:13:22');
INSERT INTO public.articles VALUES (67, '20211011067', 'Couteau argent doré', NULL, NULL, 16, 16, 1000, 3, 3, NULL, 3, 9, '2021-10-11 12:49:45', '2021-10-25 17:39:05');
INSERT INTO public.articles VALUES (93, '20211011093', 'Petite fourchette point', NULL, NULL, 5, 5, 200, 3, 3, NULL, 1, 7, '2021-10-11 15:55:54', '2021-10-23 22:31:47');
INSERT INTO public.articles VALUES (120, '202110300120', 'Barre LED', NULL, NULL, 7, 7, 10000, 3, 20, NULL, 3, NULL, '2021-10-30 15:05:31', '2021-12-06 23:04:34');
INSERT INTO public.articles VALUES (74, '20211011074', 'Couteau à poisson américaine', NULL, NULL, 63, 63, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:35:59', '2021-10-23 23:37:10');
INSERT INTO public.articles VALUES (68, '20211011068', 'Fourchette contour doré', NULL, NULL, 16, 16, 1000, 3, 3, NULL, 3, 7, '2021-10-11 12:50:37', '2021-10-23 23:46:12');
INSERT INTO public.articles VALUES (84, '20211011084', 'Cuillère moyenne vieux paris', NULL, NULL, 49, 49, 1000, 3, 3, NULL, 3, 9, '2021-10-11 15:03:32', '2021-10-23 23:52:11');
INSERT INTO public.articles VALUES (83, '20211011083', 'Couteau à poisson willmax', NULL, NULL, 33, 33, 350, 3, 3, NULL, 2, 8, '2021-10-11 14:04:03', '2021-10-23 23:52:43');
INSERT INTO public.articles VALUES (82, '20211011082', 'Petit couteau willmax', NULL, NULL, 80, 80, 350, 3, 3, NULL, 2, 8, '2021-10-11 14:03:38', '2021-10-23 23:53:54');
INSERT INTO public.articles VALUES (78, '20211011078', 'Petite fourchette 4 dents willmax', NULL, NULL, 0, 0, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:50:52', '2021-10-23 23:54:33');
INSERT INTO public.articles VALUES (92, '20211011092', 'Petite cuillère point', NULL, NULL, 32, 32, 200, 3, 3, NULL, 1, 7, '2021-10-11 15:55:27', '2021-10-23 22:32:08');
INSERT INTO public.articles VALUES (79, '20211011079', 'Petite fourchette 3 dents willmax', NULL, NULL, 18, 18, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:51:15', '2021-10-23 23:55:07');
INSERT INTO public.articles VALUES (80, '20211011080', 'Petite fourchette 2 dents willmax', NULL, NULL, 59, 59, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:51:42', '2021-10-23 23:55:37');
INSERT INTO public.articles VALUES (81, '20211011081', 'Couteau willmax', NULL, NULL, 5, 5, 350, 3, 3, NULL, 2, 8, '2021-10-11 14:03:16', '2021-10-23 23:56:03');
INSERT INTO public.articles VALUES (91, '20211011091', 'Couteau moyen point', NULL, NULL, 0, 0, 200, 3, 3, NULL, 1, 7, '2021-10-11 15:54:05', '2021-10-23 22:35:12');
INSERT INTO public.articles VALUES (90, '20211011090', 'Couteau à poisson point', NULL, NULL, 0, 0, 200, 3, 3, NULL, 1, 7, '2021-10-11 15:52:48', '2021-10-23 22:35:36');
INSERT INTO public.articles VALUES (89, '20211011089', 'Fourchette moyenne point', NULL, NULL, 0, 0, 200, 3, 3, NULL, 1, 7, '2021-10-11 15:52:16', '2021-10-23 22:36:18');
INSERT INTO public.articles VALUES (88, '20211011088', 'Plus petite cuillère trait', NULL, NULL, 50, 50, 200, 3, 3, NULL, 1, 7, '2021-10-11 15:23:18', '2021-10-23 22:36:49');
INSERT INTO public.articles VALUES (65, '20211011065', 'Couteau à poisson  contour doré', NULL, NULL, 14, 14, 1000, 3, 3, NULL, 3, 9, '2021-10-11 12:48:22', '2021-10-24 00:01:37');
INSERT INTO public.articles VALUES (99, '20211011099', 'Couteau bas rond', NULL, 'articles/2021099_Couteau bas rond.jpg', 50, 50, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:44:26', '2021-10-23 22:25:06');
INSERT INTO public.articles VALUES (75, '20211011075', 'Fourchette willmax', NULL, NULL, 32, 32, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:48:58', '2021-10-23 22:48:28');
INSERT INTO public.articles VALUES (87, '20211011087', 'Petite cuillère trait', NULL, NULL, 110, 110, 200, 3, 3, NULL, 1, 7, '2021-10-11 15:17:18', '2021-10-23 22:53:22');
INSERT INTO public.articles VALUES (76, '20211011076', 'Petite cuillère willmax', NULL, NULL, 23, 23, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:49:18', '2021-10-23 22:54:03');
INSERT INTO public.articles VALUES (77, '20211011077', 'Fourchette moyenne willmax', NULL, NULL, 65, 65, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:50:12', '2021-10-23 22:54:50');
INSERT INTO public.articles VALUES (102, '202110110102', 'Petite fourchette bas rond', NULL, 'articles/20210102_Petite fourchette bas rond.jpg', 29, 29, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:45:46', '2021-10-23 22:27:18');
INSERT INTO public.articles VALUES (101, '202110110101', 'Petite cuillère bas rond', NULL, 'articles/20210101_Petite cuillère bas rond.jpg', 29, 29, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:45:28', '2021-10-23 22:27:45');
INSERT INTO public.articles VALUES (100, '202110110100', 'Couteau moyen bas rond', NULL, NULL, 40, 40, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:44:53', '2021-10-23 22:28:36');
INSERT INTO public.articles VALUES (98, '20211011098', 'Couteau à poisson bas rond', NULL, 'articles/2021098_Couteau à poisson bas rond.jpg', 20, 20, 200, 3, 3, NULL, 1, 7, '2021-10-11 16:44:10', '2021-10-23 22:29:56');
INSERT INTO public.articles VALUES (86, '20211011086', 'Couteau moyen vieux paris', NULL, NULL, 49, 49, 1000, 3, 3, NULL, 3, 9, '2021-10-11 15:16:37', '2021-10-23 22:55:44');
INSERT INTO public.articles VALUES (109, '202110300109', 'Fumigène', NULL, NULL, 0, 0, 20000, 3, 20, NULL, 3, NULL, '2021-10-30 13:03:17', '2021-10-30 13:03:17');
INSERT INTO public.articles VALUES (113, '202110300113', 'Pouf', NULL, NULL, 0, 0, 1000, 3, 23, NULL, 1, NULL, '2021-10-30 13:22:55', '2021-10-30 13:22:55');
INSERT INTO public.articles VALUES (115, '202110300115', 'Verre à champagne style Crystal', NULL, NULL, 0, 0, 500, 3, 5, NULL, 2, NULL, '2021-10-30 13:24:43', '2021-12-06 23:28:40');
INSERT INTO public.articles VALUES (114, '202110300114', 'Coussin', NULL, NULL, 0, 0, 500, 3, 23, NULL, 1, NULL, '2021-10-30 13:23:17', '2021-10-30 13:23:17');
INSERT INTO public.articles VALUES (104, '202110250104', 'Car Climatisé', NULL, NULL, 1, 1, 90000, 3, 22, NULL, 2, NULL, '2021-10-25 14:34:31', '2022-02-22 20:29:35');
INSERT INTO public.articles VALUES (117, '202110300117', 'Chaise Channel', NULL, NULL, 2, 2, 7500, 3, 4, NULL, 2, NULL, '2021-10-30 13:26:31', '2021-12-06 23:27:45');
INSERT INTO public.articles VALUES (112, '202110300112', 'Table Pic Nic Basse blanche', NULL, NULL, 10, 10, 1500, 3, 23, NULL, 1, NULL, '2021-10-30 13:22:18', '2021-12-06 23:27:45');
INSERT INTO public.articles VALUES (118, '202110300118', 'Fauteuil Coquillage individuel', NULL, NULL, 0, 0, 100000, 3, 7, NULL, 3, NULL, '2021-10-30 13:28:39', '2021-10-30 13:28:39');
INSERT INTO public.articles VALUES (119, '202110300119', 'Fauteuil Coquillage pour deux', NULL, NULL, 0, 0, 200000, 3, 7, NULL, 3, NULL, '2021-10-30 13:29:27', '2021-10-30 13:29:27');
INSERT INTO public.articles VALUES (111, '202110300111', 'Jeux de lumière robot', NULL, NULL, 0, 0, 20000, 3, 20, NULL, 3, NULL, '2021-10-30 13:17:05', '2021-10-30 15:06:24');
INSERT INTO public.articles VALUES (108, '202110260108', 'Table rectangulaire en bois 8 places', NULL, NULL, 0, 0, 2500, 3, 6, NULL, 1, NULL, '2021-10-26 16:09:50', '2021-12-06 23:18:47');
INSERT INTO public.articles VALUES (121, '202110300121', 'Machine à confettis + bombe confettis électrique', NULL, NULL, 0, 0, 40000, 3, 20, NULL, 3, NULL, '2021-10-30 15:10:52', '2021-10-30 15:12:32');
INSERT INTO public.articles VALUES (127, '202112060127', 'Assiette de Présentation Flammes Argentées', NULL, NULL, 49, 49, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:50:45', '2022-02-02 15:02:24');
INSERT INTO public.articles VALUES (126, '202112060126', 'Assiette de Présentation flammes dorées', NULL, NULL, 42, 42, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:50:05', '2022-02-02 15:02:56');
INSERT INTO public.articles VALUES (122, '202110300122', 'Ensemble Table et 2 poufs Coquillage', NULL, NULL, 0, 0, 100000, 3, 7, NULL, 3, NULL, '2021-10-30 15:11:46', '2021-10-30 15:17:59');
INSERT INTO public.articles VALUES (123, '202110300123', 'Machine à feu d''artifices + un feu d''artifices électrique', NULL, NULL, 0, 0, 30000, 3, 20, NULL, 3, NULL, '2021-10-30 15:16:03', '2021-10-30 15:18:34');
INSERT INTO public.articles VALUES (133, '202112060133', 'Assiette de Présentation Mariés contour argenté', NULL, NULL, 2, 2, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:55:43', '2022-02-02 15:03:43');
INSERT INTO public.articles VALUES (125, '202110300125', 'Machine à bulles', NULL, NULL, 0, 0, 30000, 3, 20, NULL, 3, NULL, '2021-10-30 15:20:58', '2021-10-30 15:20:58');
INSERT INTO public.articles VALUES (73, '20211011073', 'Petite cuillère Américaine', NULL, NULL, 52, 52, 350, 3, 3, NULL, 2, 8, '2021-10-11 13:28:20', '2021-12-06 22:48:40');
INSERT INTO public.articles VALUES (132, '202112060132', 'Assiette de Présentation Mariés contour doré', NULL, NULL, 2, 2, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:55:03', '2022-02-02 15:04:15');
INSERT INTO public.articles VALUES (137, '202202230137', 'Grande table anneau', NULL, NULL, 8, 8, 20000, 3, 6, NULL, 2, NULL, '2022-02-23 12:58:10', '2022-02-23 13:03:00');
INSERT INTO public.articles VALUES (136, '202202230136', 'Fauteuil baroque doré', NULL, NULL, 2, 2, 40000, 3, 7, NULL, 3, NULL, '2022-02-23 12:56:43', '2022-02-23 13:03:00');
INSERT INTO public.articles VALUES (124, '202110300124', 'Machine à fumée lourde', NULL, NULL, 0, 0, 60000, 3, 20, NULL, 3, NULL, '2021-10-30 15:19:50', '2021-12-06 23:17:48');
INSERT INTO public.articles VALUES (134, '202112060134', 'Table rectangulaire en bois 10  places', NULL, NULL, 0, 0, 2500, 3, 6, NULL, 1, NULL, '2021-12-06 23:19:55', '2021-12-06 23:19:55');
INSERT INTO public.articles VALUES (130, '202112060130', 'Assiette de Présentation Fils dorés', NULL, NULL, 51, 51, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:53:40', '2022-02-02 14:52:18');
INSERT INTO public.articles VALUES (128, '202112060128', 'Assiette de Présentation Contour Argenté', NULL, NULL, 45, 45, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:51:55', '2022-02-02 14:52:58');
INSERT INTO public.articles VALUES (129, '202112060129', 'Assiette de Présentation Contour Doré', NULL, NULL, 42, 42, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:52:40', '2022-02-02 14:54:22');
INSERT INTO public.articles VALUES (131, '202112060131', 'Assiette de Présentation Fils Argentés', NULL, NULL, 72, 72, 500, 3, 18, NULL, 2, NULL, '2021-12-06 22:54:18', '2022-02-02 15:00:08');
INSERT INTO public.articles VALUES (135, '202201180135', 'Chaise Médaillon Blanc', NULL, NULL, 400, 400, 3500, 3, 4, NULL, 2, NULL, '2022-01-18 09:53:13', '2022-03-02 12:56:49');
INSERT INTO public.articles VALUES (141, '202203020141', 'Chaise Médaillon Vert Emeraude', NULL, NULL, 200, 200, 3500, 3, 4, NULL, 2, NULL, '2022-03-02 12:54:47', '2022-03-02 13:05:05');
INSERT INTO public.articles VALUES (139, '202203020139', 'Chaise Médaillon Rouge', NULL, NULL, 200, 200, 3500, 3, 4, NULL, 2, NULL, '2022-03-02 12:52:46', '2022-03-02 13:05:05');
INSERT INTO public.articles VALUES (140, '202203020140', 'Chaise Médaillon Rose Gold', NULL, NULL, 200, 200, 3500, 3, 4, NULL, 2, NULL, '2022-03-02 12:53:17', '2022-03-02 13:05:05');
INSERT INTO public.articles VALUES (138, '202203020138', 'Chaise Médaillon Noir', NULL, NULL, 200, 200, 3500, 3, 4, NULL, 2, NULL, '2022-03-02 12:52:14', '2022-03-02 13:06:25');


--
-- TOC entry 3110 (class 0 OID 27871)
-- Dependencies: 206
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.categories VALUES (1, '2021092000', 'Bronze', NULL, '2021-09-20 13:49:33', '2021-09-20 13:49:33');
INSERT INTO public.categories VALUES (2, '2021092001', 'Silver', NULL, '2021-09-20 13:49:33', '2021-09-20 13:49:33');
INSERT INTO public.categories VALUES (3, '2021092002', 'Millénium', NULL, '2021-09-20 13:49:33', '2021-09-20 13:49:33');


--
-- TOC entry 3112 (class 0 OID 27879)
-- Dependencies: 208
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.clients VALUES (1, '2021092701', 'Orchidéa Agency', NULL, NULL, NULL, 3, '2021-09-27 21:46:20', '2021-09-27 21:46:21');
INSERT INTO public.clients VALUES (2, '2021092702', 'Mme AUGOU', NULL, NULL, NULL, 3, '2021-09-27 21:46:43', '2021-09-27 21:46:43');
INSERT INTO public.clients VALUES (3, '2021092703', 'Mme Judith de LOURDES', NULL, NULL, NULL, 3, '2021-09-27 21:47:03', '2021-09-27 21:47:03');
INSERT INTO public.clients VALUES (4, '2021092704', 'Mme Marie Ange', NULL, NULL, NULL, 3, '2021-09-27 21:47:22', '2021-09-27 21:47:22');
INSERT INTO public.clients VALUES (6, '2021102406', 'Mme Amandine ADJA', NULL, NULL, NULL, 3, '2021-10-24 00:05:10', '2021-10-24 00:05:10');
INSERT INTO public.clients VALUES (7, '2021102407', 'Mme Clarisse', NULL, NULL, NULL, 3, '2021-10-24 00:05:27', '2021-10-24 00:05:27');
INSERT INTO public.clients VALUES (8, NULL, 'AGEROUTE', NULL, NULL, NULL, 3, '2021-10-25 14:58:21', '2021-10-25 14:58:21');
INSERT INTO public.clients VALUES (9, NULL, 'Jeanine services', NULL, NULL, NULL, 3, '2021-12-01 09:48:39', '2021-12-01 09:48:39');
INSERT INTO public.clients VALUES (10, NULL, 'M DIABATE SEKOU', '0708001413', NULL, NULL, 3, '2022-02-22 20:41:26', '2022-02-22 20:41:26');
INSERT INTO public.clients VALUES (11, NULL, 'Mme Moularé', '0707836189', NULL, NULL, 3, '2022-02-23 13:07:27', '2022-02-23 13:07:27');
INSERT INTO public.clients VALUES (12, NULL, 'LEAKO EVENTS', '0777282929', NULL, NULL, 3, '2022-02-25 15:48:49', '2022-02-25 15:48:49');


--
-- TOC entry 3114 (class 0 OID 27887)
-- Dependencies: 210
-- Data for Name: destockages; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.destockages VALUES (1, NULL, 180, 'Autre', 3, 3, '2021-10-11 13:11:20', '2021-10-11 13:11:20');
INSERT INTO public.destockages VALUES (2, NULL, 100, 'Autre', 9, 3, '2021-10-11 13:11:20', '2021-10-11 13:11:20');
INSERT INTO public.destockages VALUES (3, NULL, 45, 'Autre', 13, 3, '2021-10-11 13:11:20', '2021-10-11 13:11:20');
INSERT INTO public.destockages VALUES (4, NULL, 5, 'Autre', 13, 3, '2021-10-11 13:15:04', '2021-10-11 13:15:04');
INSERT INTO public.destockages VALUES (5, NULL, 2, 'Autre', 132, 3, '2022-02-02 14:57:43', '2022-02-02 14:57:43');
INSERT INTO public.destockages VALUES (6, NULL, 2, 'Autre', 133, 3, '2022-02-02 14:57:43', '2022-02-02 14:57:43');


--
-- TOC entry 3116 (class 0 OID 27893)
-- Dependencies: 212
-- Data for Name: entrers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.entrers VALUES (1, '21090', '2021-09-28 16:26:52', false, 3, '2021-09-28 15:26:51', '2021-09-28 15:26:51');
INSERT INTO public.entrers VALUES (2, '21101', '2021-10-11 13:46:17', false, 3, '2021-10-11 12:46:17', '2021-10-11 12:46:17');
INSERT INTO public.entrers VALUES (3, '21102', '2021-10-11 13:54:16', false, 3, '2021-10-11 12:54:15', '2021-10-11 12:54:15');
INSERT INTO public.entrers VALUES (4, '21103', '2021-10-11 14:05:18', false, 3, '2021-10-11 13:05:18', '2021-10-11 13:05:18');
INSERT INTO public.entrers VALUES (5, '21104', '2021-10-11 14:19:01', false, 3, '2021-10-11 13:19:00', '2021-10-11 13:19:00');
INSERT INTO public.entrers VALUES (6, '21105', '2021-10-11 14:35:14', false, 3, '2021-10-11 13:35:14', '2021-10-11 13:35:14');
INSERT INTO public.entrers VALUES (7, '21106', '2021-10-11 14:41:11', false, 3, '2021-10-11 13:41:11', '2021-10-11 13:41:11');
INSERT INTO public.entrers VALUES (8, '21107', '2021-10-11 15:53:25', false, 3, '2021-10-11 14:53:24', '2021-10-11 14:53:24');
INSERT INTO public.entrers VALUES (9, '21108', '2021-10-11 15:57:34', false, 3, '2021-10-11 14:57:33', '2021-10-11 14:57:33');
INSERT INTO public.entrers VALUES (10, '21109', '2021-10-11 15:59:53', false, 3, '2021-10-11 14:59:53', '2021-10-11 14:59:53');
INSERT INTO public.entrers VALUES (11, '211010', '2021-10-11 16:27:03', false, 3, '2021-10-11 15:27:02', '2021-10-11 15:27:02');
INSERT INTO public.entrers VALUES (12, '211011', '2021-10-11 16:46:50', false, 3, '2021-10-11 15:46:49', '2021-10-11 15:46:49');
INSERT INTO public.entrers VALUES (13, '211012', '2021-10-11 16:48:14', false, 3, '2021-10-11 15:48:13', '2021-10-11 15:48:13');
INSERT INTO public.entrers VALUES (14, '211013', '2021-10-11 17:10:45', false, 3, '2021-10-11 16:10:44', '2021-10-11 16:10:44');
INSERT INTO public.entrers VALUES (15, '211014', '2021-10-11 17:15:01', false, 3, '2021-10-11 16:15:00', '2021-10-11 16:15:00');
INSERT INTO public.entrers VALUES (16, '211015', '2021-10-11 20:46:54', false, 3, '2021-10-11 19:46:54', '2021-10-11 19:46:54');
INSERT INTO public.entrers VALUES (17, '211016', '2021-10-25 15:55:06', false, 3, '2021-10-25 14:55:05', '2021-10-25 14:55:05');
INSERT INTO public.entrers VALUES (18, '211017', '2021-10-26 17:04:15', false, 3, '2021-10-26 16:04:14', '2021-10-26 16:04:14');
INSERT INTO public.entrers VALUES (19, '211218', '2021-12-07 00:04:34', false, 3, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.entrers VALUES (20, '211219', '2021-12-07 00:05:41', false, 3, '2021-12-06 23:05:41', '2021-12-06 23:05:41');
INSERT INTO public.entrers VALUES (21, '211220', '2021-12-07 00:27:46', false, 3, '2021-12-06 23:27:45', '2021-12-06 23:27:45');
INSERT INTO public.entrers VALUES (22, '220221', '2022-02-02 16:01:31', false, 3, '2022-02-02 15:01:30', '2022-02-02 15:01:30');
INSERT INTO public.entrers VALUES (23, '220222', '2022-02-05 00:28:49', false, 3, '2022-02-04 23:28:49', '2022-02-04 23:28:49');
INSERT INTO public.entrers VALUES (24, '220223', '2022-02-23 14:03:00', false, 3, '2022-02-23 13:02:59', '2022-02-23 13:02:59');
INSERT INTO public.entrers VALUES (25, '220324', '2022-03-02 14:05:05', false, 3, '2022-03-02 13:05:05', '2022-03-02 13:05:05');


--
-- TOC entry 3118 (class 0 OID 27900)
-- Dependencies: 214
-- Data for Name: evenements; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.evenements VALUES (6, NULL, 'Mariage', 100, 270000, NULL, 1, 'abidjan', 'EN COURS', NULL, 45000, '2021-12-01 16:00:00', '2021-12-03 07:00:00', 1, 1, '2021-11-30 22:58:41', '2021-12-01 10:00:30', 25, 90000);
INSERT INTO public.evenements VALUES (7, NULL, 'evenement', 250, 250000, NULL, 1, NULL, 'ANNULÉ', NULL, 62500, '2021-12-03 14:00:00', '2021-12-05 08:00:00', 1, 9, '2021-12-01 09:48:40', '2021-12-01 10:01:30', 25, 0);
INSERT INTO public.evenements VALUES (9, NULL, 'Séminaire', NULL, 2400000, NULL, 30, 'Yamoussoukro', 'DEVIS', NULL, 0, '2021-11-02 00:00:00', '2021-12-02 00:00:00', 6, 8, '2021-12-07 12:48:42', '2021-12-07 12:48:42', 0, 0);
INSERT INTO public.evenements VALUES (8, NULL, 'mariage', NULL, 600000, NULL, 1, NULL, 'TERMINÉ', NULL, 150000, '2021-12-03 12:00:00', '2021-12-04 12:00:00', 1, 8, '2021-12-01 10:12:18', '2021-12-07 13:11:21', 25, 0);
INSERT INTO public.evenements VALUES (10, NULL, 'DEJEUNER', NULL, 1100000, NULL, 1, NULL, 'DEVIS', NULL, 275000, '2022-01-22 09:22:00', '2022-01-23 09:22:00', NULL, 1, '2022-01-18 09:26:14', '2022-01-18 09:26:14', 25, 0);
INSERT INTO public.evenements VALUES (11, NULL, 'SEMINAIRE', 40, 8280000, NULL, 91, NULL, 'DEVIS', NULL, 0, '2022-03-01 07:00:00', '2022-05-31 20:00:00', NULL, 10, '2022-02-22 20:41:26', '2022-02-22 20:41:26', 0, 0);
INSERT INTO public.evenements VALUES (12, NULL, 'Facture proforma Mme Moularé du 06-03-2022', NULL, 100000, NULL, 1, 'Espace Calao Attoban', 'DEVIS', NULL, 0, '2022-03-05 16:00:00', '2022-03-07 08:00:00', NULL, 11, '2022-02-23 13:07:27', '2022-02-23 13:07:27', 0, 0);
INSERT INTO public.evenements VALUES (13, NULL, 'FACTURE LEAKO EVENTS DU 12 MARS 2022', 400, 1157500, NULL, 2, 'Golf', 'DEVIS', NULL, 0, '2022-03-11 16:00:00', '2022-03-13 16:00:00', NULL, 12, '2022-02-25 15:48:49', '2022-03-02 12:41:34', 0, 252500);
INSERT INTO public.evenements VALUES (14, NULL, 'FACTURE LEAKO EVENTS DU 26 MARS 2022', 70, 245000, NULL, 2, NULL, 'DEVIS', NULL, 0, '2022-03-25 16:00:00', '2022-03-27 16:00:00', NULL, 12, '2022-03-02 12:36:00', '2022-03-02 13:07:22', 0, 49000);


--
-- TOC entry 3120 (class 0 OID 27909)
-- Dependencies: 216
-- Data for Name: factures; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.factures VALUES (6, 'FA2111-6', 'Facture-Mariage', '2021-11-30', 45000, 3, 6, '2021-11-30 22:58:41', '2021-11-30 22:58:41');
INSERT INTO public.factures VALUES (7, 'FA2112-7', 'Facture-evenement', '2021-12-01', 62500, 3, 7, '2021-12-01 09:48:40', '2021-12-01 09:48:40');
INSERT INTO public.factures VALUES (8, 'FA2112-8', 'Facture-mariage', '2021-12-01', 150000, 3, 8, '2021-12-01 10:12:18', '2021-12-01 10:12:18');
INSERT INTO public.factures VALUES (9, 'FA2112-9', 'Facture-Séminaire', '2021-12-07', 0, 3, 9, '2021-12-07 12:48:42', '2021-12-07 12:48:42');
INSERT INTO public.factures VALUES (10, 'FA2201-10', 'Facture-DEJEUNER', '2022-01-18', 275000, 3, 10, '2022-01-18 09:26:14', '2022-01-18 09:26:14');
INSERT INTO public.factures VALUES (11, 'FA2202-11', 'Facture-SEMINAIRE', '2022-02-22', 0, 3, 11, '2022-02-22 20:41:26', '2022-02-22 20:41:26');
INSERT INTO public.factures VALUES (12, 'FA2202-12', 'Facture-Facture proforma Mme Moularé du 06-03-2022', '2022-02-23', 0, 3, 12, '2022-02-23 13:07:27', '2022-02-23 13:07:27');
INSERT INTO public.factures VALUES (13, 'FA2202-13', 'Facture-FACTURE LEAKO EVENTS DU 12 MARS 2022', '2022-02-25', 0, 3, 13, '2022-02-25 15:48:49', '2022-03-02 12:41:34');
INSERT INTO public.factures VALUES (14, 'FA2203-14', 'Facture-FACTURE LEAKO EVENTS DU 26 MARS 2022', '2022-03-02', 0, 3, 14, '2022-03-02 12:36:01', '2022-03-02 13:07:22');


--
-- TOC entry 3122 (class 0 OID 27914)
-- Dependencies: 218
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3124 (class 0 OID 27923)
-- Dependencies: 220
-- Data for Name: fournisseurs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3126 (class 0 OID 27931)
-- Dependencies: 222
-- Data for Name: ligne_entrers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ligne_entrers VALUES (1, 13, 1, 50, '2021-09-28 15:26:51', '2021-09-28 15:26:51');
INSERT INTO public.ligne_entrers VALUES (2, 9, 1, 100, '2021-09-28 15:26:51', '2021-09-28 15:26:51');
INSERT INTO public.ligne_entrers VALUES (3, 3, 1, 200, '2021-09-28 15:26:52', '2021-09-28 15:26:52');
INSERT INTO public.ligne_entrers VALUES (4, 19, 2, 48, '2021-10-11 12:46:17', '2021-10-11 12:46:17');
INSERT INTO public.ligne_entrers VALUES (5, 67, 3, 16, '2021-10-11 12:54:15', '2021-10-11 12:54:15');
INSERT INTO public.ligne_entrers VALUES (6, 68, 3, 16, '2021-10-11 12:54:15', '2021-10-11 12:54:15');
INSERT INTO public.ligne_entrers VALUES (7, 66, 3, 6, '2021-10-11 12:54:15', '2021-10-11 12:54:15');
INSERT INTO public.ligne_entrers VALUES (8, 65, 3, 14, '2021-10-11 12:54:16', '2021-10-11 12:54:16');
INSERT INTO public.ligne_entrers VALUES (9, 72, 4, 6, '2021-10-11 13:05:18', '2021-10-11 13:05:18');
INSERT INTO public.ligne_entrers VALUES (10, 71, 4, 6, '2021-10-11 13:05:18', '2021-10-11 13:05:18');
INSERT INTO public.ligne_entrers VALUES (11, 70, 4, 30, '2021-10-11 13:05:18', '2021-10-11 13:05:18');
INSERT INTO public.ligne_entrers VALUES (12, 69, 4, 6, '2021-10-11 13:05:18', '2021-10-11 13:05:18');
INSERT INTO public.ligne_entrers VALUES (13, 21, 5, 23, '2021-10-11 13:19:00', '2021-10-11 13:19:00');
INSERT INTO public.ligne_entrers VALUES (14, 20, 5, 204, '2021-10-11 13:19:00', '2021-10-11 13:19:00');
INSERT INTO public.ligne_entrers VALUES (15, 14, 5, 222, '2021-10-11 13:19:01', '2021-10-11 13:19:01');
INSERT INTO public.ligne_entrers VALUES (16, 13, 5, 221, '2021-10-11 13:19:01', '2021-10-11 13:19:01');
INSERT INTO public.ligne_entrers VALUES (17, 12, 5, 193, '2021-10-11 13:19:01', '2021-10-11 13:19:01');
INSERT INTO public.ligne_entrers VALUES (18, 17, 6, 100, '2021-10-11 13:35:14', '2021-10-11 13:35:14');
INSERT INTO public.ligne_entrers VALUES (19, 16, 6, 90, '2021-10-11 13:35:14', '2021-10-11 13:35:14');
INSERT INTO public.ligne_entrers VALUES (20, 15, 6, 104, '2021-10-11 13:35:14', '2021-10-11 13:35:14');
INSERT INTO public.ligne_entrers VALUES (21, 73, 6, 52, '2021-10-11 13:35:14', '2021-10-11 13:35:14');
INSERT INTO public.ligne_entrers VALUES (22, 74, 7, 63, '2021-10-11 13:41:11', '2021-10-11 13:41:11');
INSERT INTO public.ligne_entrers VALUES (23, 77, 8, 65, '2021-10-11 14:53:24', '2021-10-11 14:53:24');
INSERT INTO public.ligne_entrers VALUES (24, 76, 8, 23, '2021-10-11 14:53:24', '2021-10-11 14:53:24');
INSERT INTO public.ligne_entrers VALUES (25, 83, 8, 33, '2021-10-11 14:53:24', '2021-10-11 14:53:24');
INSERT INTO public.ligne_entrers VALUES (26, 82, 8, 80, '2021-10-11 14:53:24', '2021-10-11 14:53:24');
INSERT INTO public.ligne_entrers VALUES (27, 81, 8, 5, '2021-10-11 14:53:25', '2021-10-11 14:53:25');
INSERT INTO public.ligne_entrers VALUES (28, 75, 8, 32, '2021-10-11 14:53:25', '2021-10-11 14:53:25');
INSERT INTO public.ligne_entrers VALUES (29, 18, 8, 195, '2021-10-11 14:53:25', '2021-10-11 14:53:25');
INSERT INTO public.ligne_entrers VALUES (30, 79, 9, 18, '2021-10-11 14:57:33', '2021-10-11 14:57:33');
INSERT INTO public.ligne_entrers VALUES (31, 80, 9, 59, '2021-10-11 14:57:33', '2021-10-11 14:57:33');
INSERT INTO public.ligne_entrers VALUES (32, 24, 10, 53, '2021-10-11 14:59:53', '2021-10-11 14:59:53');
INSERT INTO public.ligne_entrers VALUES (33, 23, 10, 143, '2021-10-11 14:59:53', '2021-10-11 14:59:53');
INSERT INTO public.ligne_entrers VALUES (34, 22, 10, 135, '2021-10-11 14:59:53', '2021-10-11 14:59:53');
INSERT INTO public.ligne_entrers VALUES (35, 86, 11, 49, '2021-10-11 15:27:02', '2021-10-11 15:27:02');
INSERT INTO public.ligne_entrers VALUES (36, 85, 11, 49, '2021-10-11 15:27:03', '2021-10-11 15:27:03');
INSERT INTO public.ligne_entrers VALUES (37, 84, 11, 49, '2021-10-11 15:27:03', '2021-10-11 15:27:03');
INSERT INTO public.ligne_entrers VALUES (38, 25, 11, 27, '2021-10-11 15:27:03', '2021-10-11 15:27:03');
INSERT INTO public.ligne_entrers VALUES (39, 87, 12, 110, '2021-10-11 15:46:49', '2021-10-11 15:46:49');
INSERT INTO public.ligne_entrers VALUES (40, 11, 12, 270, '2021-10-11 15:46:50', '2021-10-11 15:46:50');
INSERT INTO public.ligne_entrers VALUES (41, 10, 12, 246, '2021-10-11 15:46:50', '2021-10-11 15:46:50');
INSERT INTO public.ligne_entrers VALUES (42, 9, 12, 215, '2021-10-11 15:46:50', '2021-10-11 15:46:50');
INSERT INTO public.ligne_entrers VALUES (43, 88, 13, 50, '2021-10-11 15:48:13', '2021-10-11 15:48:13');
INSERT INTO public.ligne_entrers VALUES (44, 93, 14, 5, '2021-10-11 16:10:44', '2021-10-11 16:10:44');
INSERT INTO public.ligne_entrers VALUES (45, 92, 14, 32, '2021-10-11 16:10:44', '2021-10-11 16:10:44');
INSERT INTO public.ligne_entrers VALUES (46, 8, 14, 94, '2021-10-11 16:10:44', '2021-10-11 16:10:44');
INSERT INTO public.ligne_entrers VALUES (47, 7, 14, 90, '2021-10-11 16:10:45', '2021-10-11 16:10:45');
INSERT INTO public.ligne_entrers VALUES (48, 6, 14, 84, '2021-10-11 16:10:45', '2021-10-11 16:10:45');
INSERT INTO public.ligne_entrers VALUES (49, 94, 15, 99, '2021-10-11 16:15:00', '2021-10-11 16:15:00');
INSERT INTO public.ligne_entrers VALUES (50, 102, 16, 29, '2021-10-11 19:46:54', '2021-10-11 19:46:54');
INSERT INTO public.ligne_entrers VALUES (51, 101, 16, 29, '2021-10-11 19:46:54', '2021-10-11 19:46:54');
INSERT INTO public.ligne_entrers VALUES (52, 95, 16, 52, '2021-10-11 19:46:54', '2021-10-11 19:46:54');
INSERT INTO public.ligne_entrers VALUES (53, 98, 16, 20, '2021-10-11 19:46:54', '2021-10-11 19:46:54');
INSERT INTO public.ligne_entrers VALUES (54, 99, 16, 50, '2021-10-11 19:46:54', '2021-10-11 19:46:54');
INSERT INTO public.ligne_entrers VALUES (55, 100, 16, 40, '2021-10-11 19:46:54', '2021-10-11 19:46:54');
INSERT INTO public.ligne_entrers VALUES (56, 104, 17, 1, '2021-10-25 14:55:05', '2021-10-25 14:55:05');
INSERT INTO public.ligne_entrers VALUES (57, 3, 18, 455, '2021-10-26 16:04:14', '2021-10-26 16:04:14');
INSERT INTO public.ligne_entrers VALUES (58, 2, 18, 588, '2021-10-26 16:04:14', '2021-10-26 16:04:14');
INSERT INTO public.ligne_entrers VALUES (59, 1, 18, 705, '2021-10-26 16:04:14', '2021-10-26 16:04:14');
INSERT INTO public.ligne_entrers VALUES (60, 4, 18, 419, '2021-10-26 16:04:14', '2021-10-26 16:04:14');
INSERT INTO public.ligne_entrers VALUES (61, 5, 18, 578, '2021-10-26 16:04:15', '2021-10-26 16:04:15');
INSERT INTO public.ligne_entrers VALUES (62, 120, 19, 7, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (63, 132, 19, 2, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (64, 133, 19, 2, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (65, 128, 19, 45, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (66, 129, 19, 42, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (67, 131, 19, 72, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (68, 127, 19, 49, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (69, 126, 19, 42, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (70, 130, 19, 51, '2021-12-06 23:04:34', '2021-12-06 23:04:34');
INSERT INTO public.ligne_entrers VALUES (71, 4, 20, 91, '2021-12-06 23:05:41', '2021-12-06 23:05:41');
INSERT INTO public.ligne_entrers VALUES (72, 116, 21, 2, '2021-12-06 23:27:45', '2021-12-06 23:27:45');
INSERT INTO public.ligne_entrers VALUES (73, 117, 21, 2, '2021-12-06 23:27:45', '2021-12-06 23:27:45');
INSERT INTO public.ligne_entrers VALUES (74, 112, 21, 10, '2021-12-06 23:27:45', '2021-12-06 23:27:45');
INSERT INTO public.ligne_entrers VALUES (75, 132, 22, 2, '2022-02-02 15:01:30', '2022-02-02 15:01:30');
INSERT INTO public.ligne_entrers VALUES (76, 133, 22, 2, '2022-02-02 15:01:31', '2022-02-02 15:01:31');
INSERT INTO public.ligne_entrers VALUES (77, 135, 23, 400, '2022-02-04 23:28:49', '2022-02-04 23:28:49');
INSERT INTO public.ligne_entrers VALUES (78, 137, 24, 8, '2022-02-23 13:03:00', '2022-02-23 13:03:00');
INSERT INTO public.ligne_entrers VALUES (79, 136, 24, 2, '2022-02-23 13:03:00', '2022-02-23 13:03:00');
INSERT INTO public.ligne_entrers VALUES (80, 141, 25, 200, '2022-03-02 13:05:05', '2022-03-02 13:05:05');
INSERT INTO public.ligne_entrers VALUES (81, 139, 25, 200, '2022-03-02 13:05:05', '2022-03-02 13:05:05');
INSERT INTO public.ligne_entrers VALUES (82, 140, 25, 200, '2022-03-02 13:05:05', '2022-03-02 13:05:05');
INSERT INTO public.ligne_entrers VALUES (83, 138, 25, 200, '2022-03-02 13:05:05', '2022-03-02 13:05:05');


--
-- TOC entry 3128 (class 0 OID 27937)
-- Dependencies: 224
-- Data for Name: locations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.locations VALUES (8, 180, 0, 1, 270000, 'Enregistré', 'BON ETAT', NULL, NULL, 3, 2, 6, 1, '2021-11-30 22:58:41', '2021-11-30 22:58:41');
INSERT INTO public.locations VALUES (9, 250, 0, 1, 250000, 'Enregistré', 'BON ETAT', NULL, NULL, 3, 3, 7, 9, '2021-12-01 09:48:40', '2021-12-01 09:48:40');
INSERT INTO public.locations VALUES (10, 400, 0, 1, 600000, 'Enregistré', 'BON ETAT', NULL, NULL, 3, 2, 8, 8, '2021-12-01 10:12:19', '2021-12-01 10:12:19');
INSERT INTO public.locations VALUES (11, 1, 0, 30, 2400000, 'Enregistré', 'BON ETAT', NULL, NULL, 3, 104, 9, 8, '2021-12-07 12:48:42', '2021-12-07 12:48:42');
INSERT INTO public.locations VALUES (12, 100, 0, 1, 100000, 'Enregistré', 'BON ETAT', '2022-01-22 09:22:00', NULL, 3, 3, 10, 1, '2022-01-18 09:26:15', '2022-01-18 09:26:15');
INSERT INTO public.locations VALUES (13, 500, 0, 1, 1000000, 'Enregistré', 'BON ETAT', '2022-01-22 09:22:00', NULL, 3, 5, 10, 1, '2022-01-18 09:26:15', '2022-01-18 09:26:15');
INSERT INTO public.locations VALUES (14, 1, 0, 92, 8280000, 'Enregistré', 'BON ETAT', '2022-03-01 07:00:00', NULL, 3, 104, 11, 10, '2022-02-22 20:41:26', '2022-02-22 20:41:26');
INSERT INTO public.locations VALUES (15, 1, 0, 1, 20000, 'Enregistré', 'BON ETAT', '2022-03-05 16:00:00', NULL, 3, 137, 12, 11, '2022-02-23 13:07:28', '2022-02-23 13:07:28');
INSERT INTO public.locations VALUES (16, 2, 0, 1, 80000, 'Enregistré', 'BON ETAT', '2022-03-05 16:00:00', NULL, 3, 136, 12, 11, '2022-02-23 13:07:28', '2022-02-23 13:07:28');
INSERT INTO public.locations VALUES (22, 105, NULL, 1, 157500, 'Enregistré', 'BON ETAT', NULL, NULL, 3, 2, 13, 12, '2022-03-02 12:41:34', '2022-03-02 12:41:34');
INSERT INTO public.locations VALUES (23, 400, NULL, 1, 1000000, 'Enregistré', 'BON ETAT', NULL, NULL, 3, 4, 13, 12, '2022-03-02 12:41:34', '2022-03-02 12:41:34');
INSERT INTO public.locations VALUES (24, 70, NULL, 1, 245000, 'Enregistré', 'BON ETAT', NULL, NULL, 3, 138, 14, 12, '2022-03-02 13:07:22', '2022-03-02 13:07:22');


--
-- TOC entry 3130 (class 0 OID 27946)
-- Dependencies: 226
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO public.migrations VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations VALUES (4, '2021_06_09_234905_create_articles_table', 1);
INSERT INTO public.migrations VALUES (5, '2021_06_11_163524_create_packages_table', 1);
INSERT INTO public.migrations VALUES (6, '2021_06_11_163802_create_categories_table', 1);
INSERT INTO public.migrations VALUES (7, '2021_06_11_163816_create_clients_table', 1);
INSERT INTO public.migrations VALUES (8, '2021_06_11_163817_create_factures_table', 1);
INSERT INTO public.migrations VALUES (9, '2021_06_11_163829_create_remarques_table', 1);
INSERT INTO public.migrations VALUES (10, '2021_06_22_235813_create_evenements_table', 1);
INSERT INTO public.migrations VALUES (11, '2021_07_08_043227_create_fournisseurs_table', 1);
INSERT INTO public.migrations VALUES (12, '2021_07_08_050209_create_reglements_table', 1);
INSERT INTO public.migrations VALUES (13, '2021_07_08_050434_create_entrers_table', 1);
INSERT INTO public.migrations VALUES (14, '2021_07_08_050705_create_locations_table', 1);
INSERT INTO public.migrations VALUES (15, '2021_07_08_050922_create_type_evenements_table', 1);
INSERT INTO public.migrations VALUES (16, '2021_07_08_051016_create_type_articles_table', 1);
INSERT INTO public.migrations VALUES (17, '2021_07_08_051607_create_article_packages_table', 1);
INSERT INTO public.migrations VALUES (18, '2021_08_02_075205_create_destockages_table', 1);
INSERT INTO public.migrations VALUES (19, '2021_08_02_084541_create_ligne_entrers_table', 1);
INSERT INTO public.migrations VALUES (20, '2021_08_03_035936_create_parametrages_table', 1);
INSERT INTO public.migrations VALUES (21, '2021_08_08_062846_create_permission_tables', 1);
INSERT INTO public.migrations VALUES (22, '2021_08_11_000730_create_tarifications_table', 1);
INSERT INTO public.migrations VALUES (23, '2022_06_11_165407_add_contraintes_table', 1);
INSERT INTO public.migrations VALUES (24, '2021_10_18_093936_add_percentage_caution_to_evenements_table', 2);
INSERT INTO public.migrations VALUES (25, '2021_11_09_093728_add_remise_coloumn_to_evenement_table', 3);


--
-- TOC entry 3132 (class 0 OID 27951)
-- Dependencies: 228
-- Data for Name: model_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3133 (class 0 OID 27954)
-- Dependencies: 229
-- Data for Name: model_has_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.model_has_roles VALUES (4, 'App\User', 3);
INSERT INTO public.model_has_roles VALUES (5, 'App\User', 4);


--
-- TOC entry 3134 (class 0 OID 27957)
-- Dependencies: 230
-- Data for Name: packages; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3136 (class 0 OID 27965)
-- Dependencies: 232
-- Data for Name: parametrages; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3138 (class 0 OID 27973)
-- Dependencies: 234
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3139 (class 0 OID 27976)
-- Dependencies: 235
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.permissions VALUES (1, 'edit parametrage', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (2, 'delete parametrage', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (3, 'create parametrage', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (4, 'show parametrage', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (5, 'parametrage', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (6, 'create articles', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (7, 'edit articles', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (8, 'delete articles', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (9, 'show articles', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (10, 'articles', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (11, 'create users', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (12, 'edit users', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (13, 'delete users', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (14, 'show users', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (15, 'users', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (16, 'dashboard', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (17, 'location', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (18, 'metier', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (19, 'stock', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (20, 'entree stock', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.permissions VALUES (21, 'sortie stock', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');


--
-- TOC entry 3141 (class 0 OID 27981)
-- Dependencies: 237
-- Data for Name: reglements; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3143 (class 0 OID 27989)
-- Dependencies: 239
-- Data for Name: remarques; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3145 (class 0 OID 27994)
-- Dependencies: 241
-- Data for Name: role_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.role_has_permissions VALUES (18, 2);
INSERT INTO public.role_has_permissions VALUES (19, 2);
INSERT INTO public.role_has_permissions VALUES (10, 3);
INSERT INTO public.role_has_permissions VALUES (5, 3);
INSERT INTO public.role_has_permissions VALUES (1, 4);
INSERT INTO public.role_has_permissions VALUES (2, 4);
INSERT INTO public.role_has_permissions VALUES (3, 4);
INSERT INTO public.role_has_permissions VALUES (4, 4);
INSERT INTO public.role_has_permissions VALUES (5, 4);
INSERT INTO public.role_has_permissions VALUES (6, 4);
INSERT INTO public.role_has_permissions VALUES (7, 4);
INSERT INTO public.role_has_permissions VALUES (8, 4);
INSERT INTO public.role_has_permissions VALUES (9, 4);
INSERT INTO public.role_has_permissions VALUES (10, 4);
INSERT INTO public.role_has_permissions VALUES (11, 4);
INSERT INTO public.role_has_permissions VALUES (12, 4);
INSERT INTO public.role_has_permissions VALUES (13, 4);
INSERT INTO public.role_has_permissions VALUES (14, 4);
INSERT INTO public.role_has_permissions VALUES (15, 4);
INSERT INTO public.role_has_permissions VALUES (16, 4);
INSERT INTO public.role_has_permissions VALUES (17, 4);
INSERT INTO public.role_has_permissions VALUES (18, 4);
INSERT INTO public.role_has_permissions VALUES (19, 4);
INSERT INTO public.role_has_permissions VALUES (20, 4);
INSERT INTO public.role_has_permissions VALUES (21, 4);
INSERT INTO public.role_has_permissions VALUES (1, 5);
INSERT INTO public.role_has_permissions VALUES (2, 5);
INSERT INTO public.role_has_permissions VALUES (3, 5);
INSERT INTO public.role_has_permissions VALUES (4, 5);
INSERT INTO public.role_has_permissions VALUES (5, 5);
INSERT INTO public.role_has_permissions VALUES (6, 5);
INSERT INTO public.role_has_permissions VALUES (7, 5);
INSERT INTO public.role_has_permissions VALUES (8, 5);
INSERT INTO public.role_has_permissions VALUES (9, 5);
INSERT INTO public.role_has_permissions VALUES (10, 5);
INSERT INTO public.role_has_permissions VALUES (11, 5);
INSERT INTO public.role_has_permissions VALUES (12, 5);
INSERT INTO public.role_has_permissions VALUES (13, 5);
INSERT INTO public.role_has_permissions VALUES (14, 5);
INSERT INTO public.role_has_permissions VALUES (15, 5);
INSERT INTO public.role_has_permissions VALUES (16, 5);
INSERT INTO public.role_has_permissions VALUES (17, 5);
INSERT INTO public.role_has_permissions VALUES (18, 5);
INSERT INTO public.role_has_permissions VALUES (19, 5);
INSERT INTO public.role_has_permissions VALUES (20, 5);
INSERT INTO public.role_has_permissions VALUES (21, 5);


--
-- TOC entry 3146 (class 0 OID 27997)
-- Dependencies: 242
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.roles VALUES (1, 'utilisateur', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.roles VALUES (2, 'secretaire', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.roles VALUES (3, 'manager', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.roles VALUES (4, 'admin', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');
INSERT INTO public.roles VALUES (5, 'super-admin', 'web', '2021-09-20 13:49:35', '2021-09-20 13:49:35');


--
-- TOC entry 3148 (class 0 OID 28002)
-- Dependencies: 244
-- Data for Name: tarifications; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tarifications VALUES (7, 0, 1, 3, '2021-09-20 14:26:15', '2021-09-20 14:26:15');
INSERT INTO public.tarifications VALUES (8, 0, 2, 3, '2021-09-20 14:26:15', '2021-09-20 14:26:15');
INSERT INTO public.tarifications VALUES (9, 0, 3, 3, '2021-09-20 14:26:15', '2021-09-20 14:26:15');
INSERT INTO public.tarifications VALUES (10, 0, 1, 4, '2021-09-20 14:26:32', '2021-09-20 14:26:32');
INSERT INTO public.tarifications VALUES (11, 0, 2, 4, '2021-09-20 14:26:32', '2021-09-20 14:26:32');
INSERT INTO public.tarifications VALUES (12, 0, 3, 4, '2021-09-20 14:26:32', '2021-09-20 14:26:32');
INSERT INTO public.tarifications VALUES (13, 0, 1, 5, '2021-09-20 14:26:46', '2021-09-20 14:26:46');
INSERT INTO public.tarifications VALUES (14, 0, 2, 5, '2021-09-20 14:26:46', '2021-09-20 14:26:46');
INSERT INTO public.tarifications VALUES (15, 0, 3, 5, '2021-09-20 14:26:46', '2021-09-20 14:26:46');
INSERT INTO public.tarifications VALUES (16, 0, 1, 6, '2021-09-20 14:27:07', '2021-09-20 14:27:07');
INSERT INTO public.tarifications VALUES (17, 0, 2, 6, '2021-09-20 14:27:07', '2021-09-20 14:27:07');
INSERT INTO public.tarifications VALUES (18, 0, 3, 6, '2021-09-20 14:27:07', '2021-09-20 14:27:07');
INSERT INTO public.tarifications VALUES (19, 0, 1, 7, '2021-09-20 14:27:35', '2021-09-20 14:27:35');
INSERT INTO public.tarifications VALUES (20, 0, 2, 7, '2021-09-20 14:27:35', '2021-09-20 14:27:35');
INSERT INTO public.tarifications VALUES (21, 0, 3, 7, '2021-09-20 14:27:35', '2021-09-20 14:27:35');
INSERT INTO public.tarifications VALUES (22, 0, 1, 8, '2021-09-20 14:27:50', '2021-09-20 14:27:50');
INSERT INTO public.tarifications VALUES (23, 0, 2, 8, '2021-09-20 14:27:50', '2021-09-20 14:27:50');
INSERT INTO public.tarifications VALUES (24, 0, 3, 8, '2021-09-20 14:27:50', '2021-09-20 14:27:50');
INSERT INTO public.tarifications VALUES (25, 0, 1, 9, '2021-09-20 14:28:11', '2021-09-20 14:28:11');
INSERT INTO public.tarifications VALUES (26, 0, 2, 9, '2021-09-20 14:28:11', '2021-09-20 14:28:11');
INSERT INTO public.tarifications VALUES (27, 0, 3, 9, '2021-09-20 14:28:11', '2021-09-20 14:28:11');
INSERT INTO public.tarifications VALUES (28, 0, 1, 10, '2021-09-20 14:46:36', '2021-09-20 14:46:36');
INSERT INTO public.tarifications VALUES (29, 0, 2, 10, '2021-09-20 14:46:36', '2021-09-20 14:46:36');
INSERT INTO public.tarifications VALUES (30, 0, 3, 10, '2021-09-20 14:46:36', '2021-09-20 14:46:36');
INSERT INTO public.tarifications VALUES (31, 0, 1, 11, '2021-09-20 14:46:51', '2021-09-20 14:46:51');
INSERT INTO public.tarifications VALUES (32, 0, 2, 11, '2021-09-20 14:46:51', '2021-09-20 14:46:51');
INSERT INTO public.tarifications VALUES (33, 0, 3, 11, '2021-09-20 14:46:51', '2021-09-20 14:46:51');
INSERT INTO public.tarifications VALUES (34, 0, 1, 12, '2021-09-20 14:47:26', '2021-09-20 14:47:26');
INSERT INTO public.tarifications VALUES (35, 0, 2, 12, '2021-09-20 14:47:26', '2021-09-20 14:47:26');
INSERT INTO public.tarifications VALUES (36, 0, 3, 12, '2021-09-20 14:47:26', '2021-09-20 14:47:26');
INSERT INTO public.tarifications VALUES (37, 0, 1, 13, '2021-09-20 14:47:44', '2021-09-20 14:47:44');
INSERT INTO public.tarifications VALUES (38, 0, 2, 13, '2021-09-20 14:47:44', '2021-09-20 14:47:44');
INSERT INTO public.tarifications VALUES (39, 0, 3, 13, '2021-09-20 14:47:44', '2021-09-20 14:47:44');
INSERT INTO public.tarifications VALUES (40, 0, 1, 14, '2021-09-20 14:48:00', '2021-09-20 14:48:00');
INSERT INTO public.tarifications VALUES (41, 0, 2, 14, '2021-09-20 14:48:00', '2021-09-20 14:48:00');
INSERT INTO public.tarifications VALUES (42, 0, 3, 14, '2021-09-20 14:48:00', '2021-09-20 14:48:00');
INSERT INTO public.tarifications VALUES (43, 0, 1, 15, '2021-09-20 14:48:27', '2021-09-20 14:48:27');
INSERT INTO public.tarifications VALUES (44, 0, 2, 15, '2021-09-20 14:48:27', '2021-09-20 14:48:27');
INSERT INTO public.tarifications VALUES (45, 0, 3, 15, '2021-09-20 14:48:27', '2021-09-20 14:48:27');
INSERT INTO public.tarifications VALUES (46, 0, 1, 16, '2021-09-20 14:48:43', '2021-09-20 14:48:43');
INSERT INTO public.tarifications VALUES (47, 0, 2, 16, '2021-09-20 14:48:43', '2021-09-20 14:48:43');
INSERT INTO public.tarifications VALUES (48, 0, 3, 16, '2021-09-20 14:48:43', '2021-09-20 14:48:43');
INSERT INTO public.tarifications VALUES (49, 0, 1, 17, '2021-09-20 14:50:09', '2021-09-20 14:50:09');
INSERT INTO public.tarifications VALUES (50, 0, 2, 17, '2021-09-20 14:50:09', '2021-09-20 14:50:09');
INSERT INTO public.tarifications VALUES (51, 0, 3, 17, '2021-09-20 14:50:09', '2021-09-20 14:50:09');
INSERT INTO public.tarifications VALUES (54, 0, 3, 18, '2021-09-20 14:51:47', '2021-09-20 14:51:47');
INSERT INTO public.tarifications VALUES (55, 0, 1, 19, '2021-09-20 14:53:11', '2021-09-20 14:53:11');
INSERT INTO public.tarifications VALUES (56, 0, 2, 19, '2021-09-20 14:53:11', '2021-09-20 14:53:11');
INSERT INTO public.tarifications VALUES (57, 0, 3, 19, '2021-09-20 14:53:11', '2021-09-20 14:53:11');
INSERT INTO public.tarifications VALUES (58, 0, 1, 20, '2021-09-20 14:53:32', '2021-09-20 14:53:32');
INSERT INTO public.tarifications VALUES (59, 0, 2, 20, '2021-09-20 14:53:32', '2021-09-20 14:53:32');
INSERT INTO public.tarifications VALUES (60, 0, 3, 20, '2021-09-20 14:53:32', '2021-09-20 14:53:32');
INSERT INTO public.tarifications VALUES (61, 0, 1, 21, '2021-09-20 14:56:18', '2021-09-20 14:56:18');
INSERT INTO public.tarifications VALUES (62, 0, 2, 21, '2021-09-20 14:56:18', '2021-09-20 14:56:18');
INSERT INTO public.tarifications VALUES (63, 0, 3, 21, '2021-09-20 14:56:18', '2021-09-20 14:56:18');
INSERT INTO public.tarifications VALUES (53, 500, 2, 18, '2021-09-20 14:51:47', '2021-10-11 12:04:16');
INSERT INTO public.tarifications VALUES (52, 200, 1, 18, '2021-09-20 14:51:47', '2021-10-11 12:04:38');
INSERT INTO public.tarifications VALUES (64, 0, 1, 22, '2021-10-25 14:12:49', '2021-10-25 14:12:49');
INSERT INTO public.tarifications VALUES (65, 0, 2, 22, '2021-10-25 14:12:50', '2021-10-25 14:12:50');
INSERT INTO public.tarifications VALUES (66, 0, 3, 22, '2021-10-25 14:12:50', '2021-10-25 14:12:50');
INSERT INTO public.tarifications VALUES (67, 0, 1, 23, '2021-10-25 19:49:30', '2021-10-25 19:49:30');
INSERT INTO public.tarifications VALUES (68, 0, 2, 23, '2021-10-25 19:49:30', '2021-10-25 19:49:30');
INSERT INTO public.tarifications VALUES (69, 0, 3, 23, '2021-10-25 19:49:30', '2021-10-25 19:49:30');


--
-- TOC entry 3150 (class 0 OID 28008)
-- Dependencies: 246
-- Data for Name: type_articles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.type_articles VALUES (3, '2021092003', 'COUVERT', NULL, '2021-09-20 14:26:15', '2021-09-20 14:26:15');
INSERT INTO public.type_articles VALUES (4, '2021092004', 'CHAISE', NULL, '2021-09-20 14:26:32', '2021-09-20 14:26:32');
INSERT INTO public.type_articles VALUES (5, '2021092005', 'VERRE', NULL, '2021-09-20 14:26:46', '2021-09-20 14:26:46');
INSERT INTO public.type_articles VALUES (6, '2021092006', 'TABLE', NULL, '2021-09-20 14:27:07', '2021-09-20 14:27:07');
INSERT INTO public.type_articles VALUES (8, '2021092008', 'PLATEAU', NULL, '2021-09-20 14:27:50', '2021-09-20 14:27:50');
INSERT INTO public.type_articles VALUES (9, '2021092009', 'SEAU A CHAMPAGNE', NULL, '2021-09-20 14:28:11', '2021-09-20 14:28:11');
INSERT INTO public.type_articles VALUES (10, '20210920010', 'BONBONNE DECORATIVE', NULL, '2021-09-20 14:46:36', '2021-09-20 14:46:36');
INSERT INTO public.type_articles VALUES (11, '20210920011', 'BONBONNE', NULL, '2021-09-20 14:46:51', '2021-09-20 14:46:51');
INSERT INTO public.type_articles VALUES (12, '20210920012', 'PISTE DE DANSE', NULL, '2021-09-20 14:47:26', '2021-09-20 14:47:26');
INSERT INTO public.type_articles VALUES (13, '20210920013', 'FUMIGENE', NULL, '2021-09-20 14:47:44', '2021-09-20 14:47:44');
INSERT INTO public.type_articles VALUES (14, '20210920014', 'MACHINE A BULLES', NULL, '2021-09-20 14:48:00', '2021-09-20 14:48:00');
INSERT INTO public.type_articles VALUES (15, '20210920015', 'NAPPE', NULL, '2021-09-20 14:48:27', '2021-09-20 14:48:27');
INSERT INTO public.type_articles VALUES (16, '20210920016', 'ROND DE SERVIETTE', NULL, '2021-09-20 14:48:43', '2021-09-20 14:48:43');
INSERT INTO public.type_articles VALUES (17, '20210920017', 'ELEMENT DE SERVICE', NULL, '2021-09-20 14:50:09', '2021-09-20 14:50:09');
INSERT INTO public.type_articles VALUES (7, '2021092007', 'SALON DE MARIES', NULL, '2021-09-20 14:27:35', '2021-09-20 14:50:35');
INSERT INTO public.type_articles VALUES (18, '20210920018', 'ASSIETTE', NULL, '2021-09-20 14:51:47', '2021-09-20 14:51:47');
INSERT INTO public.type_articles VALUES (19, '20210920019', 'MACHINE A NEIGE', NULL, '2021-09-20 14:53:11', '2021-09-20 14:53:11');
INSERT INTO public.type_articles VALUES (20, '20210920020', 'EFFETS SPECIAUX', NULL, '2021-09-20 14:53:32', '2021-09-20 14:53:32');
INSERT INTO public.type_articles VALUES (22, '20211025022', 'Véhicule', NULL, '2021-10-25 14:12:49', '2021-10-25 14:12:49');
INSERT INTO public.type_articles VALUES (23, '20211025023', 'MATERIEL PIC NIC', NULL, '2021-10-25 19:49:30', '2021-10-25 19:49:30');
INSERT INTO public.type_articles VALUES (21, '20210920021', 'DECORATION', NULL, '2021-09-20 14:56:18', '2021-10-30 13:08:21');


--
-- TOC entry 3152 (class 0 OID 28016)
-- Dependencies: 248
-- Data for Name: type_evenements; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.type_evenements VALUES (1, '2021092001', 'Mariage', NULL, '2021-09-20 14:14:01', '2021-09-20 14:14:01');
INSERT INTO public.type_evenements VALUES (2, '2021092002', 'Baptème', NULL, '2021-09-20 14:14:19', '2021-09-20 14:14:19');
INSERT INTO public.type_evenements VALUES (3, '2021092003', 'Anniversaire', NULL, '2021-09-20 14:14:32', '2021-09-20 14:14:32');
INSERT INTO public.type_evenements VALUES (4, '2021092004', 'Dîner', NULL, '2021-09-20 14:18:56', '2021-09-20 14:18:56');
INSERT INTO public.type_evenements VALUES (5, '2021092005', 'Déjeuner', NULL, '2021-09-20 14:19:13', '2021-09-20 14:19:13');
INSERT INTO public.type_evenements VALUES (6, '2021092006', 'Séminaire', NULL, '2021-09-20 14:19:54', '2021-09-20 14:19:54');
INSERT INTO public.type_evenements VALUES (7, '2021101107', 'Gala', NULL, '2021-10-11 12:00:05', '2021-10-11 12:00:06');
INSERT INTO public.type_evenements VALUES (8, '2021101108', 'Obsèques', NULL, '2021-10-11 12:00:22', '2021-10-11 12:00:22');
INSERT INTO public.type_evenements VALUES (9, '2021102409', 'Cocktail', NULL, '2021-10-24 00:03:02', '2021-10-24 00:03:02');


--
-- TOC entry 3154 (class 0 OID 28024)
-- Dependencies: 250
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users VALUES (3, 'administrateur', 'administrateur', NULL, NULL, 'Mme', '$2y$10$yejcsIYb6BQSgIr3DGbsP.lt5rkydpFm8E5lAZV7IOXhGsGcyJQXa', NULL, '2021-09-20 13:49:32', '2021-09-20 13:49:32');
INSERT INTO public.users VALUES (4, 'root', 'Dev', NULL, NULL, 'Mme', '$2y$10$2D4aqGR84f6EkZnjM5ht.urXY3.oqO12VaXhZG3PV9oZZTkcu93My', NULL, '2021-09-20 13:49:32', '2021-09-20 13:49:32');


--
-- TOC entry 3187 (class 0 OID 0)
-- Dependencies: 203
-- Name: article_packages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.article_packages_id_seq', 1, false);


--
-- TOC entry 3188 (class 0 OID 0)
-- Dependencies: 205
-- Name: articles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.articles_id_seq', 141, true);


--
-- TOC entry 3189 (class 0 OID 0)
-- Dependencies: 207
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 3, true);


--
-- TOC entry 3190 (class 0 OID 0)
-- Dependencies: 209
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clients_id_seq', 12, true);


--
-- TOC entry 3191 (class 0 OID 0)
-- Dependencies: 211
-- Name: destockages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.destockages_id_seq', 6, true);


--
-- TOC entry 3192 (class 0 OID 0)
-- Dependencies: 213
-- Name: entrers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.entrers_id_seq', 25, true);


--
-- TOC entry 3193 (class 0 OID 0)
-- Dependencies: 215
-- Name: evenements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.evenements_id_seq', 14, true);


--
-- TOC entry 3194 (class 0 OID 0)
-- Dependencies: 217
-- Name: factures_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.factures_id_seq', 14, true);


--
-- TOC entry 3195 (class 0 OID 0)
-- Dependencies: 219
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3196 (class 0 OID 0)
-- Dependencies: 221
-- Name: fournisseurs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fournisseurs_id_seq', 1, false);


--
-- TOC entry 3197 (class 0 OID 0)
-- Dependencies: 223
-- Name: ligne_entrers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ligne_entrers_id_seq', 83, true);


--
-- TOC entry 3198 (class 0 OID 0)
-- Dependencies: 225
-- Name: locations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.locations_id_seq', 24, true);


--
-- TOC entry 3199 (class 0 OID 0)
-- Dependencies: 227
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 25, true);


--
-- TOC entry 3200 (class 0 OID 0)
-- Dependencies: 231
-- Name: packages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.packages_id_seq', 1, false);


--
-- TOC entry 3201 (class 0 OID 0)
-- Dependencies: 233
-- Name: parametrages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.parametrages_id_seq', 1, false);


--
-- TOC entry 3202 (class 0 OID 0)
-- Dependencies: 236
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permissions_id_seq', 21, true);


--
-- TOC entry 3203 (class 0 OID 0)
-- Dependencies: 238
-- Name: reglements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reglements_id_seq', 1, false);


--
-- TOC entry 3204 (class 0 OID 0)
-- Dependencies: 240
-- Name: remarques_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.remarques_id_seq', 1, false);


--
-- TOC entry 3205 (class 0 OID 0)
-- Dependencies: 243
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 5, true);


--
-- TOC entry 3206 (class 0 OID 0)
-- Dependencies: 245
-- Name: tarifications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tarifications_id_seq', 69, true);


--
-- TOC entry 3207 (class 0 OID 0)
-- Dependencies: 247
-- Name: type_articles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.type_articles_id_seq', 23, true);


--
-- TOC entry 3208 (class 0 OID 0)
-- Dependencies: 249
-- Name: type_evenements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.type_evenements_id_seq', 9, true);


--
-- TOC entry 3209 (class 0 OID 0)
-- Dependencies: 251
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 4, true);


--
-- TOC entry 2887 (class 2606 OID 28058)
-- Name: article_packages article_packages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article_packages
    ADD CONSTRAINT article_packages_pkey PRIMARY KEY (id);


--
-- TOC entry 2889 (class 2606 OID 28060)
-- Name: articles articles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_pkey PRIMARY KEY (id);


--
-- TOC entry 2891 (class 2606 OID 28062)
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- TOC entry 2893 (class 2606 OID 28064)
-- Name: clients clients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- TOC entry 2895 (class 2606 OID 28066)
-- Name: destockages destockages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.destockages
    ADD CONSTRAINT destockages_pkey PRIMARY KEY (id);


--
-- TOC entry 2897 (class 2606 OID 28068)
-- Name: entrers entrers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entrers
    ADD CONSTRAINT entrers_pkey PRIMARY KEY (id);


--
-- TOC entry 2899 (class 2606 OID 28070)
-- Name: evenements evenements_libelle_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evenements
    ADD CONSTRAINT evenements_libelle_unique UNIQUE (libelle);


--
-- TOC entry 2901 (class 2606 OID 28072)
-- Name: evenements evenements_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evenements
    ADD CONSTRAINT evenements_pkey PRIMARY KEY (id);


--
-- TOC entry 2903 (class 2606 OID 28074)
-- Name: factures factures_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factures
    ADD CONSTRAINT factures_pkey PRIMARY KEY (id);


--
-- TOC entry 2905 (class 2606 OID 28076)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 2907 (class 2606 OID 28078)
-- Name: fournisseurs fournisseurs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fournisseurs
    ADD CONSTRAINT fournisseurs_pkey PRIMARY KEY (id);


--
-- TOC entry 2909 (class 2606 OID 28080)
-- Name: ligne_entrers ligne_entrers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ligne_entrers
    ADD CONSTRAINT ligne_entrers_pkey PRIMARY KEY (id);


--
-- TOC entry 2911 (class 2606 OID 28082)
-- Name: locations locations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locations
    ADD CONSTRAINT locations_pkey PRIMARY KEY (id);


--
-- TOC entry 2913 (class 2606 OID 28084)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2916 (class 2606 OID 28086)
-- Name: model_has_permissions model_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);


--
-- TOC entry 2919 (class 2606 OID 28088)
-- Name: model_has_roles model_has_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);


--
-- TOC entry 2921 (class 2606 OID 28090)
-- Name: packages packages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.packages
    ADD CONSTRAINT packages_pkey PRIMARY KEY (id);


--
-- TOC entry 2923 (class 2606 OID 28092)
-- Name: parametrages parametrages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parametrages
    ADD CONSTRAINT parametrages_pkey PRIMARY KEY (id);


--
-- TOC entry 2926 (class 2606 OID 28094)
-- Name: permissions permissions_name_guard_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_guard_name_unique UNIQUE (name, guard_name);


--
-- TOC entry 2928 (class 2606 OID 28096)
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 2930 (class 2606 OID 28098)
-- Name: reglements reglements_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reglements
    ADD CONSTRAINT reglements_pkey PRIMARY KEY (id);


--
-- TOC entry 2932 (class 2606 OID 28100)
-- Name: remarques remarques_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.remarques
    ADD CONSTRAINT remarques_pkey PRIMARY KEY (id);


--
-- TOC entry 2934 (class 2606 OID 28102)
-- Name: role_has_permissions role_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);


--
-- TOC entry 2936 (class 2606 OID 28104)
-- Name: roles roles_name_guard_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_guard_name_unique UNIQUE (name, guard_name);


--
-- TOC entry 2938 (class 2606 OID 28106)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 2941 (class 2606 OID 28108)
-- Name: tarifications tarifications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarifications
    ADD CONSTRAINT tarifications_pkey PRIMARY KEY (id);


--
-- TOC entry 2943 (class 2606 OID 28110)
-- Name: type_articles type_articles_libelle_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.type_articles
    ADD CONSTRAINT type_articles_libelle_unique UNIQUE (libelle);


--
-- TOC entry 2945 (class 2606 OID 28112)
-- Name: type_articles type_articles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.type_articles
    ADD CONSTRAINT type_articles_pkey PRIMARY KEY (id);


--
-- TOC entry 2947 (class 2606 OID 28114)
-- Name: type_evenements type_evenements_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.type_evenements
    ADD CONSTRAINT type_evenements_pkey PRIMARY KEY (id);


--
-- TOC entry 2949 (class 2606 OID 28116)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2914 (class 1259 OID 28117)
-- Name: model_has_permissions_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);


--
-- TOC entry 2917 (class 1259 OID 28118)
-- Name: model_has_roles_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);


--
-- TOC entry 2924 (class 1259 OID 28119)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 2939 (class 1259 OID 28120)
-- Name: tarifications_categorie_article_id_type_article_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX tarifications_categorie_article_id_type_article_id_index ON public.tarifications USING btree (categorie_article_id, type_article_id);


--
-- TOC entry 2950 (class 2606 OID 28121)
-- Name: article_packages article_packages_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article_packages
    ADD CONSTRAINT article_packages_article_id_foreign FOREIGN KEY (article_id) REFERENCES public.articles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2951 (class 2606 OID 28126)
-- Name: article_packages article_packages_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article_packages
    ADD CONSTRAINT article_packages_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2952 (class 2606 OID 28131)
-- Name: articles articles_categorie_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_categorie_id_foreign FOREIGN KEY (categorie_id) REFERENCES public.categories(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2953 (class 2606 OID 28136)
-- Name: articles articles_remarque_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_remarque_id_foreign FOREIGN KEY (remarque_id) REFERENCES public.remarques(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2954 (class 2606 OID 28141)
-- Name: articles articles_tarification_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_tarification_id_foreign FOREIGN KEY (tarification_id) REFERENCES public.tarifications(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2955 (class 2606 OID 28146)
-- Name: articles articles_type_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_type_article_id_foreign FOREIGN KEY (type_article_id) REFERENCES public.type_articles(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2956 (class 2606 OID 28151)
-- Name: articles articles_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2957 (class 2606 OID 28156)
-- Name: clients clients_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients
    ADD CONSTRAINT clients_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2958 (class 2606 OID 28161)
-- Name: destockages destockages_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.destockages
    ADD CONSTRAINT destockages_article_id_foreign FOREIGN KEY (article_id) REFERENCES public.articles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2959 (class 2606 OID 28166)
-- Name: destockages destockages_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.destockages
    ADD CONSTRAINT destockages_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2960 (class 2606 OID 28171)
-- Name: entrers entrers_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entrers
    ADD CONSTRAINT entrers_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2961 (class 2606 OID 28176)
-- Name: evenements evenements_client_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evenements
    ADD CONSTRAINT evenements_client_id_foreign FOREIGN KEY (client_id) REFERENCES public.clients(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2962 (class 2606 OID 28181)
-- Name: evenements evenements_type_evenement_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evenements
    ADD CONSTRAINT evenements_type_evenement_id_foreign FOREIGN KEY (type_evenement_id) REFERENCES public.type_evenements(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2963 (class 2606 OID 28186)
-- Name: factures factures_evenement_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factures
    ADD CONSTRAINT factures_evenement_id_foreign FOREIGN KEY (evenement_id) REFERENCES public.evenements(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2964 (class 2606 OID 28191)
-- Name: factures factures_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factures
    ADD CONSTRAINT factures_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2965 (class 2606 OID 28196)
-- Name: ligne_entrers ligne_entrers_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ligne_entrers
    ADD CONSTRAINT ligne_entrers_article_id_foreign FOREIGN KEY (article_id) REFERENCES public.articles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2966 (class 2606 OID 28201)
-- Name: ligne_entrers ligne_entrers_entrer_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ligne_entrers
    ADD CONSTRAINT ligne_entrers_entrer_id_foreign FOREIGN KEY (entrer_id) REFERENCES public.entrers(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2967 (class 2606 OID 28206)
-- Name: locations locations_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locations
    ADD CONSTRAINT locations_article_id_foreign FOREIGN KEY (article_id) REFERENCES public.articles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2968 (class 2606 OID 28211)
-- Name: locations locations_client_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locations
    ADD CONSTRAINT locations_client_id_foreign FOREIGN KEY (client_id) REFERENCES public.clients(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2969 (class 2606 OID 28216)
-- Name: locations locations_evenement_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locations
    ADD CONSTRAINT locations_evenement_id_foreign FOREIGN KEY (evenement_id) REFERENCES public.evenements(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2970 (class 2606 OID 28221)
-- Name: locations locations_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locations
    ADD CONSTRAINT locations_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2971 (class 2606 OID 28226)
-- Name: model_has_permissions model_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 2972 (class 2606 OID 28231)
-- Name: model_has_roles model_has_roles_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- TOC entry 2973 (class 2606 OID 28236)
-- Name: packages packages_categorie_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.packages
    ADD CONSTRAINT packages_categorie_id_foreign FOREIGN KEY (categorie_id) REFERENCES public.categories(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2974 (class 2606 OID 28241)
-- Name: reglements reglements_facture_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reglements
    ADD CONSTRAINT reglements_facture_id_foreign FOREIGN KEY (facture_id) REFERENCES public.factures(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2975 (class 2606 OID 28246)
-- Name: reglements reglements_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reglements
    ADD CONSTRAINT reglements_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2976 (class 2606 OID 28251)
-- Name: role_has_permissions role_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 2977 (class 2606 OID 28256)
-- Name: role_has_permissions role_has_permissions_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- TOC entry 2978 (class 2606 OID 28261)
-- Name: tarifications tarifications_categorie_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarifications
    ADD CONSTRAINT tarifications_categorie_article_id_foreign FOREIGN KEY (categorie_article_id) REFERENCES public.categories(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2979 (class 2606 OID 28266)
-- Name: tarifications tarifications_type_article_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarifications
    ADD CONSTRAINT tarifications_type_article_id_foreign FOREIGN KEY (type_article_id) REFERENCES public.type_articles(id) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2022-03-02 21:28:38

--
-- PostgreSQL database dump complete
--

