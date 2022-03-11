<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311121538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pedido RENAME INDEX idx_c4ec16ce79f37ae5 TO IDX_C4EC16CEA76ED395');
        $this->addSql('ALTER TABLE pedido RENAME INDEX idx_c4ec16ce998fd161 TO IDX_C4EC16CE19BA6D46');
        $this->addSql('ALTER TABLE producto CHANGE precio precio DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pedido RENAME INDEX idx_c4ec16cea76ed395 TO IDX_C4EC16CE79F37AE5');
        $this->addSql('ALTER TABLE pedido RENAME INDEX idx_c4ec16ce19ba6d46 TO IDX_C4EC16CE998FD161');
        $this->addSql('ALTER TABLE producto CHANGE precio precio NUMERIC(10, 2) NOT NULL');
    }
}
