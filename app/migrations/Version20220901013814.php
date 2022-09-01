<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901013814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factura DROP FOREIGN KEY FK_F9EBA009700047D2');
        $this->addSql('ALTER TABLE factura DROP FOREIGN KEY FK_F9EBA0098DB0387E');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3DE734E51');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3841DB1E7');
        $this->addSql('DROP TABLE factura');
        $this->addSql('DROP TABLE ticket');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE factura (id INT AUTO_INCREMENT NOT NULL, ticket_id INT NOT NULL, facturador_id INT NOT NULL, valor_a_cancelar DOUBLE PRECISION NOT NULL, fecha DATE NOT NULL, UNIQUE INDEX UNIQ_F9EBA009700047D2 (ticket_id), UNIQUE INDEX UNIQ_F9EBA0098DB0387E (facturador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, tecnico_id INT DEFAULT NULL, problema LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, solucion LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, horas INT DEFAULT NULL, estado VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_97A0ADA3841DB1E7 (tecnico_id), UNIQUE INDEX UNIQ_97A0ADA3DE734E51 (cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA0098DB0387E FOREIGN KEY (facturador_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3DE734E51 FOREIGN KEY (cliente_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3841DB1E7 FOREIGN KEY (tecnico_id) REFERENCES user (id)');
    }
}
