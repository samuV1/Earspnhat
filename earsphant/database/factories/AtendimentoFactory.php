<?php

namespace Database\Factories;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Atendimento;
use App\Models\Usuario;

class AtendimentoFactory extends Factory
{
    protected $model = Atendimento::class;

    public function definition()
    {
            // Sorteia o status entre 'aberto' e 'fechado'
            $status = $this->faker->randomElement(['Aberto', 'Fechado','Em Atendimento']);
            
            $fechamento = null;
            $abertura = $this->faker->dateTimeBetween('-1 month', 'now');

            if ($status === 'Fechado') {

                $fechamento = clone $abertura; // Clone da data de abertura
                $fechamento->modify('+' . rand(1, 15) . ' days');
                $fila = "Fechado";
            } elseif ($status === 'Em Atendimento')
            {
                $abertura = $this->faker->dateTimeBetween('-1 month', 'now');
                $fila = $this->faker->randomElement([
                    
                    'Nível 1 - Técnicos',
                    'Nível 2 - Analistas',
                    'Nível 3 - Administ.'
                    
                ]);
            }else{
                $fila = "Aberto";
                $abertura = $this->faker->dateTimeBetween('-1 month', 'now');
            }

                       
        return [
         
            'servico' => $this->faker->word, // Palavra aleatória para o serviço
            'subservico' => $this->faker->word, // Palavra aleatória para o subserviço
            'status' => $status,
            'fila' => $fila, // A fila é selecionada aleatoriamente
            'descricao' => $this->faker->sentence, // Descrição aleatória do atendimento
            'abertura' => $abertura,
            'fechamento' => $fechamento, // Preenche a data de fechamento com data aleatória, se necessário
            'ans' => now()->addDays(rand(1, 15)),
            'encarregado' => $this->faker->name, // Nome aleatório para o encarregado
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
