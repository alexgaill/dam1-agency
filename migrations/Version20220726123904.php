<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220726123904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__bien AS SELECT id, titre, description, transaction_type, surface, surface_terrain, nb_pieces, etage, adresse, code_postal, ville, prix, date_construction, type_bien, image FROM bien');
        $this->addSql('DROP TABLE bien');
        $this->addSql('CREATE TABLE bien (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, description CLOB NOT NULL, transaction_type BOOLEAN NOT NULL, surface INTEGER NOT NULL, surface_terrain INTEGER DEFAULT NULL, nb_pieces INTEGER NOT NULL, etage INTEGER DEFAULT NULL, adresse VARCHAR(255) NOT NULL, code_postal INTEGER NOT NULL, ville VARCHAR(100) NOT NULL, prix INTEGER NOT NULL, date_construction DATE DEFAULT NULL, type_bien INTEGER NOT NULL, image VARCHAR(40) DEFAULT NULL)');
        $this->addSql('INSERT INTO bien (id, titre, description, transaction_type, surface, surface_terrain, nb_pieces, etage, adresse, code_postal, ville, prix, date_construction, type_bien, image) SELECT id, titre, description, transaction_type, surface, surface_terrain, nb_pieces, etage, adresse, code_postal, ville, prix, date_construction, type_bien, image FROM __temp__bien');
        $this->addSql('DROP TABLE __temp__bien');
        $this->addSql('DROP INDEX IDX_5A8600B0BD95B80F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__option AS SELECT id, bien_id, titre FROM option');
        $this->addSql('DROP TABLE option');
        $this->addSql('CREATE TABLE option (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, bien_id INTEGER NOT NULL, titre VARCHAR(100) NOT NULL, CONSTRAINT FK_5A8600B0BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO option (id, bien_id, titre) SELECT id, bien_id, titre FROM __temp__option');
        $this->addSql('DROP TABLE __temp__option');
        $this->addSql('CREATE INDEX IDX_5A8600B0BD95B80F ON option (bien_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__bien AS SELECT id, titre, description, transaction_type, surface, surface_terrain, nb_pieces, etage, adresse, code_postal, ville, prix, date_construction, type_bien, image FROM bien');
        $this->addSql('DROP TABLE bien');
        $this->addSql('CREATE TABLE bien (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, description CLOB NOT NULL, transaction_type BOOLEAN NOT NULL, surface INTEGER NOT NULL, surface_terrain INTEGER DEFAULT NULL, nb_pieces INTEGER NOT NULL, etage INTEGER DEFAULT NULL, adresse VARCHAR(255) NOT NULL, code_postal INTEGER NOT NULL, ville VARCHAR(100) NOT NULL, prix INTEGER NOT NULL, date_construction DATE DEFAULT NULL, type_bien BOOLEAN NOT NULL, image VARCHAR(40) DEFAULT NULL)');
        $this->addSql('INSERT INTO bien (id, titre, description, transaction_type, surface, surface_terrain, nb_pieces, etage, adresse, code_postal, ville, prix, date_construction, type_bien, image) SELECT id, titre, description, transaction_type, surface, surface_terrain, nb_pieces, etage, adresse, code_postal, ville, prix, date_construction, type_bien, image FROM __temp__bien');
        $this->addSql('DROP TABLE __temp__bien');
        $this->addSql('DROP INDEX IDX_5A8600B0BD95B80F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__option AS SELECT id, bien_id, titre FROM option');
        $this->addSql('DROP TABLE option');
        $this->addSql('CREATE TABLE option (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, bien_id INTEGER NOT NULL, titre VARCHAR(100) NOT NULL)');
        $this->addSql('INSERT INTO option (id, bien_id, titre) SELECT id, bien_id, titre FROM __temp__option');
        $this->addSql('DROP TABLE __temp__option');
        $this->addSql('CREATE INDEX IDX_5A8600B0BD95B80F ON option (bien_id)');
    }
}
