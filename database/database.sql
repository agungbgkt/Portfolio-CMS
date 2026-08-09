
-- DATABASE : PORTFOLIO CMS
-- DBMS     : PostgreSQL

-- DROP TABLE
-- DROP TABLE IF EXISTS project_technologies CASCADE;
-- DROP TABLE IF EXISTS project_images CASCADE;
-- DROP TABLE IF EXISTS projects CASCADE;
-- DROP TABLE IF EXISTS technologies CASCADE;
-- DROP TABLE IF EXISTS categories CASCADE;
-- DROP TABLE IF EXISTS skills CASCADE;
-- DROP TABLE IF EXISTS experiences CASCADE;
-- DROP TABLE IF EXISTS certificates CASCADE;
-- DROP TABLE IF EXISTS contacts CASCADE;
-- DROP TABLE IF EXISTS profile CASCADE;
-- DROP TABLE IF EXISTS users CASCADE;

-- USERS
CREATE TABLE users (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    remember_token VARCHAR(100),
    role VARCHAR(20) NOT NULL DEFAULT 'admin',
    CHECK (
        role IN (
            'admin'
        )
    ),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- CATEGORIES
CREATE TABLE categories (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- PROJECTS
CREATE TABLE projects (
    id BIGSERIAL PRIMARY KEY,
    category_id BIGINT NOT NULL,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) UNIQUE NOT NULL,
    short_description VARCHAR(300) NOT NULL,
    description TEXT NOT NULL,
    thumbnail VARCHAR(255) NOT NULL,
    github_url VARCHAR(255),
    demo_url VARCHAR(255),
    client VARCHAR(150),
    year INTEGER,
    project_type VARCHAR(50),
    CHECK (
        project_type IN
        (
            'Personal',
            'Campus',
            'Internship',
            'Freelance',
            'Competition'
        )
    ),
    featured BOOLEAN NOT NULL DEFAULT FALSE,
    status VARCHAR(20) NOT NULL DEFAULT 'draft',
    CHECK (
        status IN
        (
            'draft',
            'published'
        )
    ),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    CONSTRAINT fk_project_category
    FOREIGN KEY(category_id)
    REFERENCES categories(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT chk_project_year
    CHECK
    (
        year IS NULL
        OR
        year BETWEEN 2000 
        AND EXTRACT(YEAR FROM CURRENT_DATE)::INT + 1
    )
);
-- PROJECT IMAGES
CREATE TABLE project_images (
    id BIGSERIAL PRIMARY KEY,
    project_id BIGINT NOT NULL,
    image VARCHAR(255) NOT NULL,
    caption VARCHAR(200),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_project_images
    FOREIGN KEY(project_id)
    REFERENCES projects(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);
-- TECHNOLOGIES
CREATE TABLE technologies (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    icon VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- PROJECT TECHNOLOGIES
CREATE TABLE project_technologies (
    id BIGSERIAL PRIMARY KEY,
    project_id BIGINT NOT NULL,
    technology_id BIGINT NOT NULL,
    CONSTRAINT uq_project_technology
    UNIQUE(project_id, technology_id),
    CONSTRAINT fk_project_technology_project
    FOREIGN KEY(project_id)
    REFERENCES projects(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_project_technology_technology
    FOREIGN KEY(technology_id)
    REFERENCES technologies(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);
-- SKILLS
CREATE TABLE skills (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    icon VARCHAR(255) NOT NULL,
    level INTEGER NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    CONSTRAINT chk_skill_level
    CHECK(
        level BETWEEN 0 AND 100
    )
);
-- EXPERIENCES
CREATE TABLE experiences (
    id BIGSERIAL PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    company VARCHAR(200) NOT NULL,
    location VARCHAR(200),
    employment_type VARCHAR(50),
    description TEXT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    is_present BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    CONSTRAINT chk_employment_type
    CHECK
    (
        employment_type IN
        (
            'Internship',
            'Part Time',
            'Full Time',
            'Freelance',
            'Volunteer',
            'Organization'
        )
    ),
    CONSTRAINT chk_experience_date
    CHECK
    (
        end_date IS NULL
        OR
        end_date >= start_date
    ),
    CONSTRAINT chk_present_date
    CHECK
    (
        is_present = FALSE
        OR
        end_date IS NULL
    )
);
-- CERTIFICATES
CREATE TABLE certificates (
    id BIGSERIAL PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    issuer VARCHAR(200) NOT NULL,
    issue_date DATE NOT NULL,
    image VARCHAR(255) NOT NULL,
    organization_logo VARCHAR(255),
    credential_url VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);
-- CONTACTS
CREATE TABLE contacts (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- PROFILE
-- ONLY ONE PROFILE
CREATE TABLE profile (
    id BIGSERIAL PRIMARY KEY,
    full_name VARCHAR(200) NOT NULL,
    profession VARCHAR(200) NOT NULL,
    about TEXT NOT NULL,
    photo VARCHAR(255) NOT NULL,
    cv VARCHAR(255) NOT NULL,
    location VARCHAR(150),
    email VARCHAR(150) UNIQUE,
    phone VARCHAR(30),
    github VARCHAR(255),
    linkedin VARCHAR(255),
    instagram VARCHAR(255),
    whatsapp VARCHAR(30),
    portfolio_url VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT only_one_profile
    CHECK(id = 1)
);
-- INDEX
CREATE INDEX idx_projects_category
ON projects(category_id);
CREATE INDEX idx_projects_status
ON projects(status);
CREATE INDEX idx_projects_featured
ON projects(featured);
CREATE INDEX idx_projects_slug
ON projects(slug);
CREATE INDEX idx_categories_slug
ON categories(slug);
CREATE INDEX idx_project_images_project
ON project_images(project_id);
CREATE INDEX idx_project_technology_project
ON project_technologies(project_id);
CREATE INDEX idx_project_technology_technology
ON project_technologies(technology_id);
CREATE INDEX idx_contacts_read
ON contacts(is_read);