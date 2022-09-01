<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901014755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, tecnico_id INT DEFAULT NULL, problema LONGTEXT NOT NULL, solucion LONGTEXT DEFAULT NULL, horas INT DEFAULT NULL, estado VARCHAR(1) DEFAULT NULL, INDEX IDX_97A0ADA3DE734E51 (cliente_id), INDEX IDX_97A0ADA3841DB1E7 (tecnico_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3DE734E51 FOREIGN KEY (cliente_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3841DB1E7 FOREIGN KEY (tecnico_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3DE734E51');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3841DB1E7');
        $this->addSql('DROP TABLE ticket');
    }
}
