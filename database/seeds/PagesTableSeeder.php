<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("pages")->insert([
            [
                "name"       => "Central de Ajuda",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "central-de-ajuda"
            ], [
                "name"       => "Perguntas Frequentes",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "perguntas-frequentes"
            ], [
                "name"       => "Termos e Condições",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "termos-e-condicoes"
            ], [
                "name"       => "Política de Privacidade",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "politica-de-privacidade"
            ], [
                "name"       => "Política de Propriedade Intelectual",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "politica-de-propriedade-intelectual"
            ], 
        ]);
    }
}
