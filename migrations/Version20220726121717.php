<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220726121717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, description CLOB NOT NULL, transaction_type BOOLEAN NOT NULL, surface INTEGER NOT NULL, surface_terrain INTEGER DEFAULT NULL, nb_pieces INTEGER NOT NULL, etage INTEGER DEFAULT NULL, adresse VARCHAR(255) NOT NULL, code_postal INTEGER NOT NULL, ville VARCHAR(100) NOT NULL, prix INTEGER NOT NULL, date_construction DATE DEFAULT NULL)');
        $this->addSql('CREATE TABLE option (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, bien_id INTEGER NOT NULL, titre VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5A8600B0BD95B80F ON option (bien_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE option');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
