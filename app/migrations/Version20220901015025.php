<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901015025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE factura (id INT AUTO_INCREMENT NOT NULL, ticket_id INT DEFAULT NULL, facturador_id INT DEFAULT NULL, valor_a_cancelar DOUBLE PRECISION DEFAULT NULL, fecha DATE DEFAULT NULL, UNIQUE INDEX UNIQ_F9EBA009700047D2 (ticket_id), INDEX IDX_F9EBA0098DB0387E (facturador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA0098DB0387E FOREIGN KEY (facturador_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factura DROP FOREIGN KEY FK_F9EBA009700047D2');
        $this->addSql('ALTER TABLE factura DROP FOREIGN KEY FK_F9EBA0098DB0387E');
        $this->addSql('DROP TABLE factura');
    }
}
