<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311154413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pedido (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, tienda_id INT NOT NULL, INDEX IDX_C4EC16CEA76ED395 (user_id), INDEX IDX_C4EC16CE19BA6D46 (tienda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido_producto (pedido_id INT NOT NULL, producto_id INT NOT NULL, INDEX IDX_DD333C24854653A (pedido_id), INDEX IDX_DD333C27645698E (producto_id), PRIMARY KEY(pedido_id, producto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, tipo_producto_id INT NOT NULL, nombre VARCHAR(100) NOT NULL, precio DOUBLE PRECISION NOT NULL, stock INT NOT NULL, INDEX IDX_A7BB061543614776 (tipo_producto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tienda (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_producto (id INT AUTO_INCREMENT NOT NULL, tipo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CE19BA6D46 FOREIGN KEY (tienda_id) REFERENCES tienda (id)');
        $this->addSql('ALTER TABLE pedido_producto ADD CONSTRAINT FK_DD333C24854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pedido_producto ADD CONSTRAINT FK_DD333C27645698E FOREIGN KEY (producto_id) REFERENCES producto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB061543614776 FOREIGN KEY (tipo_producto_id) REFERENCES tipo_producto (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pedido_producto DROP FOREIGN KEY FK_DD333C24854653A');
        $this->addSql('ALTER TABLE pedido_producto DROP FOREIGN KEY FK_DD333C27645698E');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CE19BA6D46');
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB061543614776');
        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CEA76ED395');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE pedido_producto');
        $this->addSql('DROP TABLE producto');
        $this->addSql('DROP TABLE tienda');
        $this->addSql('DROP TABLE tipo_producto');
        $this->addSql('DROP TABLE `user`');
    }
}
