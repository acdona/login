<?php
namespace App\adms\Models\helper;

if (!defined('R4F5CC')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use Exception;

/**
 * Classe AdmsUpdate. Responsible for generic update.
 *
 * @version 1.0
 *
 * @author Antonio Carlos Doná
 *
 * @access public
 *
*/
class AdmsUpdate extends AdmsConn
{

    private string $table;
    private string $terms;
    private array $data;
    private array $values = [];
    private string $result;
    private object $update;
    private $query;
    private object $conn;

    function getResult(): string {
        return $this->result;
    }

    public function exeUpdate($table, array $data, $terms = null, $parseString = null): void {
        $this->table = (string) $table;
        $this->data = $data;

        $this->terms = (string) $terms;

        parse_str($parseString, $this->values);

        $this->exeReplaceValues();
        $this->exeIntruction();
    }

    private function exeReplaceValues() {
        foreach ($this->data as $key => $value) {
            $values[] = $key . '=:' . $key;
        }
        $values = implode(', ', $values);

        $this->query = "UPDATE {$this->table} SET {$values} {$this->terms}";
    }

    private function exeIntruction() {
        $this->connection();
        try {
            $this->update->execute(array_merge($this->data, $this->values));
            if ($this->update->rowCount() >= 1) {
                $this->result = true;
            } else {
                $this->result = false;
            }
        } catch (Exception $ex) {
            $this->result = null;
        }
    }

    private function connection() {
        $this->conn = $this->connect();
        $this->update = $this->conn->prepare($this->query);
    }

}

?>