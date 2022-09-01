<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901014148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, facturador_id INT DEFAULT NULL, problema LONGTEXT NOT NULL, INDEX IDX_97A0ADA3DE734E51 (cliente_id), INDEX IDX_97A0ADA38DB0387E (facturador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3DE734E51 FOREIGN KEY (cliente_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA38DB0387E FOREIGN KEY (facturador_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3DE734E51');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA38DB0387E');
        $this->addSql('DROP TABLE ticket');
    }
}
