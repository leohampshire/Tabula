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
                "desc"	 => "TERMOS E CONDIÇÕES DE USO
Termos de uso
Estes Termos de Uso foram atualizados pela última vez em 24 de julho de 2017.

1. Introdução
ESTES TERMOS DE USO (“TERMOS”) VINCULAM VOCÊ, A EMPRESA QUE VOCÊ REPRESENTA E A EMPRESA QUE O REGISTROU (COLETIVAMENTE “VOCÊ”) AOS TERMOS E CONDIÇÕES ESTABELECIDOS NESTE DOCUMENTO EM RELAÇÃO AO SEU USO DO SITE, SERVIÇOS OU OUTRAS OFERTAS EM NOSSO SITE (COLETIVAMENTE, NOSSOS “SERVIÇOS”). AO USAR QUALQUER UM DOS SERVIÇOS DO TABULA OU CLICAR NO BOTÃO “INSCREVER-SE”, VOCÊ CONCORDA EM SE VINCULAR AOS TERMOS. SE VOCÊ NÃO CONCORDA COM TODOS ESTES TERMOS, CLIQUE NO BOTÃO “X” E NÃO UTILIZE OS SERVIÇOS DO TABULA. A ACEITAÇÃO DO TABULA ESTÁ EXPRESSAMENTE CONDICIONADA AO SEU CONSENTIMENTO PARA COM TODOS OS TERMOS, COM EXCLUSÃO DE TODOS OS OUTROS TERMOS. SE ESTES TERMOS FOREM CONSIDERADOS UMA OFERTA PELO TABULA, A ACEITAÇÃO É EXPRESSAMENTE LIMITADA A ESTES TERMOS.
Cláusula de pré-arbitragem:
IMPORTANTE: AO CONCORDAR COM ESTES TERMOS, VOCÊ CONCORDA EM RESOLVER DISPUTAS COM O TABULA POR MEIO DE UMA ARBITRAGEM VINCULATIVA (E COM EXCEÇÕES MUITO LIMITADAS, FORA DO TRIBUNAL), E RENUNCIA A DETERMINADOS DIREITOS A PARTICIPAR DE AÇÕES COLETIVAS, CONFORME DEFINIDO NA SEÇÃO 18.
Todos os termos em maiúsculas usados e não definidos de outra forma no presente documento terão o significado que lhes é atribuído na Política de Privacidade (“Política de Privacidade”) e nos Termos e condições do Professor (“Termos do Professor”) do Tabula.

2. Contratos adicionais
Quaisquer informações pessoais enviadas em relação ao Seu uso dos Serviços está sujeita à Nossa Política de Privacidade, a qual é, por este instrumento, incorporada por referência nestes Termos.
Além disso, se Você for um Professor (conforme definido abaixo), também está sujeito aos Termos e Condições do Professor, os quais são, por este instrumento, incorporados por referência nestes Termos. Se Você for Instrutor e houver um conflito entre estes Termos e os Termos do Professor, os Termos do Instrutor prevalecerão.

3. Disposições gerais
Nossos Serviços permitem que os alunos (“Alunos”) se conectem a professores contratados independentes (os “Instrutores”, coletivamente com Alunos, os “Usuários”) que fornecem instruções gravadas ou pelo Fórum, aulas de reforço e serviços de aprendizagem (os “Cursos”) por meio dos Nossos Serviços. Os Serviços incluem, sem limitação, facilitar e hospedar Cursos e materiais de apoio, e receber feedback de Usuários.
Periodicamente, podemos atualizar estes Termos para esclarecer nossas práticas ou para refletir práticas novas ou diferentes, como quando Nós adicionamos novos recursos, e o Tabula reserva-se o direito, a seu exclusivo critério, de modificar e/ou fazer alterações nestes Termos a qualquer momento. Se Nós fizermos alguma alteração significativa nestes Termos, notificaremos Você usando meios importantes, como notificação por e-mail enviada para o endereço de e-mail especificado em Sua Conta ou publicando uma notificação em Nossos Serviços. As modificações entrarão em vigor no dia em que elas forem publicadas, salvo se indicado de outra maneira.
Seu uso contínuo dos Nossos Serviços após as alterações entrarem em vigor significa que Você aceita essas alterações. Você deve visitar os Serviços regularmente para estar ciente da última versão dos Termos, pois quaisquer Termos revisados deverão prevalecer sobre todos os Termos anteriores.
O Tabula poderá modificar os Serviços ou interromper a disponibilidade deles a qualquer momento.
Você é o único responsável pelo pagamento das contas de serviço, telefônicas, de dados e/ou de outras taxas e custos associados ao Seu acesso e uso dos Serviços, bem como pela obtenção e manutenção de todos os equipamentos telefônicos, computacionais e de outros tipos necessários para tal acesso e uso.
Se optar por acessar ou usar Nossos Serviços que envolvam pagamento de uma taxa, Você concordará em pagar e será responsável pelo pagamento dessa taxa e de todas as taxas associadas a tal acesso ou uso. Se fornecer informações de cartão de crédito para pagar tais taxas, Você, pelo presente instrumento, declara e garante que Você está autorizado a fornecer tais informações e, pelo presente instrumento, autoriza o Tabula a cobrar Seu cartão de crédito regularmente para pagar as taxas que são devidas.
Caso Seu método de pagamento falhe ou Sua Conta esteja vencida, Nós poderemos cobrar as taxas devidas usando outros mecanismos de cobrança. Isso pode incluir outros métodos de cobrança arquivados e/ou a contratação de agências de cobrança e assessoria jurídica. Também poderemos bloquear Seu acesso a quaisquer Serviços com resolução pendente de quaisquer valores devidos por Você ao Tabula.
Todo o uso, acesso e outras atividades realizadas por Você relacionados aos Serviços devem estar de acordo com todas as leis e os regulamentos aplicáveis, incluindo, sem limitações, leis relativas a direitos autorais e outros usos de propriedade intelectual, e à privacidade e identidade pessoal. Além disso, é proibido o acesso aos Nossos Serviços a partir de territórios onde seu conteúdo seja ilegal. Aqueles que optarem por acessar ou utilizar os Serviços de locais fora da República Federativa do Brasil, farão isso por iniciativa própria e serão responsáveis pelo cumprimento de todas as normas locais, incluindo, sem limitação, as normas sobre a internet, dados, e-mail ou privacidade. Você também concorda em cumprir todas as leis aplicáveis relacionadas à transmissão de dados técnicos exportados da República Federativa do Brasil ou do país em que reside. Se usar os Serviços ou Plataformas de Terceiros (conforme definido na próxima seção) de países (fora da República Federativa do Brasil), Você deve concordar em cumprir todas as normas locais relativas à conduta on-line e ao conteúdo aceitável.

4. Aviso de isenção de responsabilidade
Os Serviços são apenas um mercado para Professores e Alunos. Nós não contratamos ou empregamos Professores, nem somos responsáveis por quaisquer interações envolvidas entre os Professores e os Alunos que compram o Curso de um Professor por meio dos Serviços. Nós não nos responsabilizamos por disputas, reivindicações, perdas, lesões ou danos de qualquer tipo que possam surgir ou estar relacionados à conduta dos Professores ou Alunos, incluindo, mas não limitado, à confiança de qualquer Aluno em qualquer informação fornecida por um Professor.
Nós não controlamos o Conteúdo Enviado (conforme definido abaixo) publicado nos Serviços e, como tal, não garantimos, de nenhuma maneira, a confiabilidade, validade, exatidão ou veracidade de tal Conteúdo Enviado. Você também confirma que, ao usar os Serviços, o Tabula pode expor Você ao Conteúdo Enviado que Você considere ofensivo, indecente ou censurável. O Tabula não se responsabiliza por evitar que esse conteúdo chegue até Você nem tem nenhuma responsabilidade por Seu acesso ou uso de qualquer Conteúdo Enviado, nos termos permitidos pela legislação em vigor.
Os Serviços podem lhe dar acesso a links para plataformas de terceiros (“Plataformas de Terceiros”), seja diretamente ou através de Cursos ou Professores. O Tabula não endossa quaisquer Plataformas de Terceiros e não as controla de nenhuma forma. Portanto, o Tabula não assume nenhuma responsabilidade associada a Plataformas de Terceiros. Você precisa tomar medidas adequadas para determinar se o acesso a uma Plataforma de Terceiros é apropriado, e para proteger Suas informações pessoais e Sua privacidade em tal Plataforma de Terceiros.

5. Conduta
Você só pode acessar os Serviços para fins lícitos. Você é o único responsável pelo conhecimento e pela adesão a todos e quaisquer regulamentos, leis e normas referentes a Seu uso dos Serviços. Você concorda em não usar os Serviços ou o Conteúdo da Empresa (conforme definido abaixo) para recrutar, incitar ou contratar, de qualquer forma, Professores ou possíveis usuários para emprego ou contratação para um negócio não afiliado Conosco sem Nossa autorização prévia por escrito, a qual pode ser recusada a Nosso exclusivo critério. Você assume todo e qualquer risco de quaisquer reuniões ou contatos entre Você e quaisquer Professores ou outros Usuários dos Serviços.

6. Obrigações específicas dos Professores
Consulte os Termos e Condições do Professor.

7. Obrigações específicas dos Alunos
Como Aluno, Você declara, garante e concorda que:

Leu, entendeu e aceita submeter-se às informações de preço (consulte a seção Preço, abaixo) antes de utilizar os Serviços ou registrar-se para frequentar um Curso.
Se Você for menor de 18 anos, somente usará os Serviços com a participação, supervisão e aprovação de um pai ou responsável legal. Crianças menores de 13 anos não podem cadastrar uma Conta, registrar-se ou comprar Cursos.
Você não carregará, publicará ou transmitirá, sem que seja solicitado ou autorizado, qualquer publicidade, material promocional, lixo eletrônico, spam, corrente, esquema de pirâmide ou qualquer outra forma de solicitação (comercial ou não) por meio dos Serviços.
Você não publicará ou fornecerá qualquer informação ou conteúdo inapropriado, ofensivo, racista, agressivo, sexista, pornográfico, falso, enganoso, incorreto, infrator, difamatório ou calunioso.
Você não copiará, modificará, fará engenharia reversa, reproduzirá, distribuirá, apresentará ou exibirá publicamente, comunicará ao público, criará trabalhos derivados, deformará, mutilará, invadirá o sistema operacional, interferirá ou, de outra forma, usará e explorará qualquer Conteúdo da Empresa, os Serviços ou Cursos ou Conteúdo Enviado, exceto segundo permitido por estes Termos ou pelo Professor relevante, conforme aplicável.
Você não enquadrará nem incorporará os Serviços para burlá-los.
Você não se passará por outra pessoa nem obterá acesso não autorizado à Conta de outra pessoa.
Você não introduzirá vírus, worm, spyware ou qualquer outro código de computador, arquivo ou programa que possa ou que se destine a danificar ou se apoderar da operação de qualquer hardware, software ou equipamento de telecomunicações, ou qualquer outro aspecto dos Serviços ou da operação do mesmo; scrape, spider, usar um robô ou outros meios automatizados de qualquer tipo para acessar os Serviços.
Você não divulgará quaisquer informações pessoais a um Professor, caso contrário será responsável por controlar como Suas informações pessoais são divulgadas ou usadas, o que inclui, por exemplo, tomar medidas apropriadas para proteger tais informações.
Você não solicitará informações pessoais de Professores ou de outros Alunos.
8. Registro
Para usar certos Serviços, Você precisará se registrar e obter uma conta e uma senha. Quando Você se registrar, as informações que Você Nos fornecer durante o processo de registro, Nos ajudarão na oferta de conteúdo, no atendimento ao cliente, na gestão de rede e em outros serviços. Você é o único responsável por manter a confidencialidade da Sua conta, do seu Nome de Usuário e da sua senha (coletivamente, Sua “Conta”) e por todas as atividades associadas à Sua Conta ou que ocorram nela. Você declara e garante que as informações de Sua Conta serão sempre precisas. Você deve (a) notificar-nos imediatamente sobre qualquer uso não autorizado de Sua Conta e qualquer outra violação de segurança e (b) assegurar-se de que Você saia de Sua Conta ao final de cada utilização dos Serviços. Nos termos permitidos pela lei em vigor, não podemos e não seremos responsáveis por quaisquer perdas ou danos decorrentes da Sua falha em cumprir com os requisitos acima mencionados ou como resultado do uso de Sua Conta, seja com ou sem o Seu conhecimento, antes que Você nos notifique do acesso não autorizado à Sua Conta.
Você não pode transferir Sua Conta a qualquer outra pessoa e não pode usar a Conta de outra pessoa em nenhum momento. Nos casos em que Você tiver autorizado ou registrado outro indivíduo, incluindo um menor, para usar Sua Conta, Você será totalmente responsável:

Pela conduta on-line de tal Aluno;
Pelo controle do acesso do Aluno e pelo uso dos Serviços;
Pelas consequências de qualquer utilização indevida.
9. Conteúdo, licenças e permissões
Todos os softwares, tecnologia, designs, materiais, informações, comunicações, textos, gráficos, links, arte eletrônica, animações, ilustrações, trabalhos de arte, clipes de áudio, videoclipes, fotos, imagens, revisões, ideias e outros dados ou materiais ou conteúdo protegidos por direitos autorais, incluindo as disposições e a seleção, são “Conteúdo”. Onde o Tabula fornece Conteúdo para Você em relação aos Serviços, incluindo, dentre outros, o software, os produtos e o site, é considerado “Conteúdo da Empresa”. Conteúdo carregado, transmitido ou publicado nos Serviços por um Usuário é “Conteúdo Enviado”. O Conteúdo permanece como propriedade privada da pessoa ou da entidade que o fornece (ou seu afiliado e/ou provedores externos e fornecedores) e é protegido, sem limitação, nos termos das leis estrangeiras de direitos autorais e da República Federativa do Brasil e outras leis de propriedade intelectual. Pelo presente documento, Você declara e garante que tem todas as licenças, os direitos, os consentimentos e as permissões necessários para conceder os direitos estabelecidos nestes Termos do Tabula em relação ao Seu Conteúdo Enviado, e que o Tabula não precisará obter quaisquer licenças, direitos, consentimentos ou permissões, ou efetuar quaisquer pagamentos para qualquer terceiro por qualquer uso ou exploração do Seu Conteúdo Enviado, conforme autorizado nestes Termos. O Tabula também não terá qualquer responsabilidade por Você ou qualquer terceiro como resultado de qualquer uso ou exploração do Seu Conteúdo Enviado, conforme autorizado nestes Termos.
O Tabula, por meio deste instrumento, concede a Você (como Usuário) uma licença limitada, não exclusiva, não transferível para acessar e usar Conteúdo Enviado e Conteúdo da Empresa, pelos quais Você pagou todas as taxas necessárias, exclusivamente para Seus fins pessoais, não comerciais, educacionais por meio dos Serviços, de acordo com estes Termos e quaisquer condições ou restrições associadas a Cursos ou Serviços específicos. Todos os outros usos serão expressamente proibidos sem Nosso expresso consentimento por escrito. Você não pode reproduzir, redistribuir, difundir, atribuir, vender, transmitir, alugar, compartilhar, emprestar, modificar, adaptar, editar, criar trabalhos derivados, licenciar ou transferir ou usar qualquer Conteúdo Enviado ou Conteúdo da Empresa a não ser que Nós forneçamos a Você permissão expressa para tal. O Conteúdo Enviado e o Conteúdo da Empresa são licenciados, e não vendidos, a Você. Os Professores não podem conceder a Você direitos de licença para o Conteúdo Enviado que Você acessa ou adquire por meio dos Serviços e qualquer licença direta é nula e uma violação destes Termos.
Não obstante o supracitado, reservamo-nos o direito de revogar esta licença para acessar e usar o Conteúdo Enviado e o Conteúdo da Empresa concedido a Você como descrito acima, conforme detalhado na seção 15 abaixo.
O TABULA RESPEITA TODAS AS LEIS DE DIREITOS AUTORAIS, PRIVACIDADE, DIFAMAÇÃO E OUTRAS LEIS RELATIVAS A CONTEÚDO E INFORMAÇÕES E NÃO TOLERARÁ A VIOLAÇÃO DE TAIS LEIS. NÃO OBSTANTE O REFERIDO ANTERIORMENTE, O TABULA NÃO INVESTIGA O CONTEÚDO ENVIADO E TODO O USO DO CONTEÚDO ENVIADO FEITO POR VOCÊ É POR SUA CONTA E RISCO, E O TABULA NÃO TEM RESPONSABILIDADE POR TAL USO. EM ESPECIAL, NENHUMA REVISÃO OU PUBLICAÇÃO OU APARÊNCIA DO CONTEÚDO ENVIADO NOS SERVIÇOS OU POR MEIO DOS SERVIÇOS DESTINA-SE A AGIR COMO ENDOSSO OU REPRESENTAÇÃO DE QUE QUALQUER CONTEÚDO ENVIADO É LIVRE DE VIOLAÇÃO DE QUAISQUER LEIS DE DIREITOS AUTORAIS, PRIVACIDADE OU OUTRAS LEIS OU SERVIRÁ A UM PROPÓSITO PARTICULAR OU SERÁ EXATA OU ÚTIL. Se Você acredita que Seu Conteúdo Enviado viola qualquer lei ou regulamento ou é impreciso ou representa qualquer risco para um terceiro, é Sua responsabilidade tomar as providências necessárias para corrigir a situação. Se Você acredita que o Conteúdo Enviado por um terceiro ou qualquer Conteúdo da Empresa viole quaisquer leis ou regulamentos, incluindo, sem limitação, quaisquer leis de direitos autorais, Você deve informar isso ao Tabula de acordo com os procedimentos que Nós mantemos em Nossa Política de Propriedade Intelectual.
Todos os direitos não expressamente concedidos nestes Termos são retidos pelos proprietários do Conteúdo, e estes Termos não concedem quaisquer licenças implícitas.
Você pode decidir nos enviar ideias não solicitadas, incluindo ideias para novas promoções, produtos, serviços, aplicativos, tecnologias ou processos ou outras ideias (coletivamente, “Ideias do Usuário”). Você não deve transmitir nenhuma Ideia do Usuário para ou por meio dos Serviços ou de Plataformas de Terceiros, ou para Nós por meio de e-mail, que Você considere confidenciais ou proprietárias. Você concorda que não seremos obrigados a tratar todas as Ideias do Usuário como sendo confidenciais ou proprietárias. Você é responsável por qualquer Ideia do Usuário que enviar. Você concorda que ao enviar Ideias do Usuário para Nós, incluindo qualquer conceito, know-how ou ideia, Você concede a Nós por meio do presente instrumento uma licença perpétua, mundial, não exclusiva, isenta de royalties, sublicenciável e transferível para usar, reproduzir, distribuir, vender, explorar, preparar trabalhos derivados e exibir as Ideias do Usuário em conexão com os Serviços, e para os negócios do Tabula (e de seu sucessor), inclusive, dentre outros, para a promoção e a redistribuição parcial ou total das Ideias do Usuário (e trabalhos derivados das mesmas) em qualquer formato de mídia e por meio de qualquer canal de mídia, seja ele conhecido atualmente ou desenvolvido no futuro, sem pagamento ou prestação de contas para Você ou outras pessoas. Nós não temos a obrigação de avaliar, analisar ou usar qualquer Ideia do Usuário.

10. Preços, pagamento e impostos
10.1. Preços
Os preços dos cursos do Tabula são determinados de acordo com os termos estabelecidos em Nossos Termos e Condições do Professor e em Nossa Política de Preços e Promoções.
Se for um Aluno, Você concorda que o Pagar.me poderá cobrar taxas adicionais caso haja quaisquer tipo de problema com seu cartão de crédito e o Tabula não é responsável por tais valores e taxas.
10.2. Pagamento
Usuários no Brasil e em outros países farão os pagamentos através do Pagar.me.
10.3. Impostos
Para vendas de qualquer Curso ou Conteúdo Enviado, Você será responsável pelo envio dos impostos à autoridade fiscal apropriada. O Tabula não pode fornecer-lhe orientações fiscais e Você deve orientar-se com seu próprio consultor fiscal.
Os impostos que regem a Receita Líquida são os previstos pela Tabela Progressiva de Imposto de Renda.
10.4. Arredondamentos
O Professor no Tabula pode colocar preços a seu exclusivo critério e os valores aceitos são apenas em reais e valores inteiros, por exemplo, R$ 10,00, R$ 400,00 e R$ 3.000,00.
10.5. Reembolsos
Devido ao fato dos pagamentos serem efetuados através do Pagar.me, os reembolsos deverão ser solicitados através deste.

10.6  Política de Cancelamento 

a)  O usuário possui, de acordo com o Código de Defesa do Consumidor e o Decreto nº7962/13, o prazo de 07 (sete) dias, contados da contratação, para optar pela manutenção do CURSO contratado;
b) Após a utilização superior a 10% (dez por cento) do CURSO, não será permitido o exercício do Direito de Arrependimento, tendo em vista, sua natureza de consumo imediato e a experimentação do CURSO.
11. Marcas registradas
As marcas registradas, marcas de serviço e os logotipos (as “Marcas registradas”) usados e exibidos em Nossos Serviços ou em qualquer Conteúdo da Empresa são Nossas Marcas registradas ou não registradas ou de Nossos fornecedores ou terceiros e são protegidas nos termos das leis de marcas registradas estrangeiras da República Federativa do Brasil. Todos os direitos são reservados e Você não poderá alterar ou ocultar as Marcas registradas, ou efetuar links para elas sem Nossa aprovação prévia.

12. Isenção de garantia
OS SERVIÇOS, CONTEÚDO DA EMPRESA, CONTEÚDO ENVIADO, CURSOS E QUAISQUER OUTROS MATERIAIS DISPONIBILIZADOS NO OU POR MEIO DO USO DOS SERVIÇOS SÃO FORNECIDOS “NO ESTADO EM QUE SE ENCONTRAM” E SEM GARANTIAS DE QUALQUER TIPO, EXPLÍCITA OU IMPLÍCITA. À EXTENSÃO MÁXIMA PERMITIDA PELA LEI APLICÁVEL, O TABULA, LICENCIADORES, FORNECEDORES, ANUNCIANTES, PATROCINADORES, PARCEIROS E REPRESENTANTES, REJEITAM TODAS AS GARANTIAS, EXPLÍCITAS OU IMPLÍCITAS, INCLUINDO, DENTRE OUTRAS, GARANTIAS IMPLÍCITAS DE TÍTULO, NÃO VIOLAÇÃO, PRECISÃO, COMERCIALIZAÇÃO E ADEQUAÇÃO A UM DETERMINADO FIM, E QUALQUER GARANTIA QUE POSSA DECORRER DO CURSO DE NEGOCIAÇÃO, CURSO DE REALIZAÇÃO OU DO USO COMERCIAL. O TABULA, LICENCIADORES, FORNECEDORES, ANUNCIANTES, PATROCINADORES, PARCEIROS E REPRESENTANTES NÃO GARANTEM QUE O USO DOS SERVIÇOS FEITO POR VOCÊ SERÁ ININTERRUPTO, LIVRE DE ERROS OU SEGURO, QUE DEFEITOS SERÃO CORRIGIDOS OU QUE OS SERVIÇOS, OS ENVIOS, OS SERVIDORES EM QUE OS SERVIÇOS SÃO HOSPEDADOS, OU QUAISQUER SERVIÇOS DISPONÍVEIS EM QUALQUER PLATAFORMA DE TERCEIROS NÃO TENHAM VÍRUS OU OUTROS COMPONENTES NOCIVOS. NENHUMA OPINIÃO, CONSELHO OU DECLARAÇÃO DO TABULA OU DE SEUS LICENCIADORES, FORNECEDORES, ANUNCIANTES, PARCEIROS, PATROCINADORES, REPRESENTANTES, MEMBROS OU VISITANTES, SEJA FEITA POR MEIO DO USO DE SERVIÇOS, EM PLATAFORMAS DE TERCEIROS OU DE OUTRA FORMA, CRIARÁ QUALQUER GARANTIA. O USO DOS SERVIÇOS FEITO POR VOCÊ, INCLUINDO, DENTRE OUTROS, QUAISQUER SERVIÇOS PRESTADOS EM QUALQUER PLATAFORMA DE TERCEIROS, FICARÁ INTEIRAMENTE POR SUA CONTA E RISCO.

13. Limitação de responsabilidade
NEM O TABULA NEM QUALQUER UM DE NOSSOS LICENCIADORES, FORNECEDORES, PARCEIROS, ANUNCIANTES OU PATROCINADORES, NEM OS DIRETORES, AGENTES, FUNCIONÁRIOS, CONSULTORES, REPRESENTANTES OU OUTROS REPRESENTANTES NOSSOS OU DELES, SÃO RESPONSÁVEIS POR QUALQUER DANO INDIRETO, ACIDENTAL, CONSEQUENTE, ESPECIAL, EXEMPLAR, PUNITIVO OU OUTROS DANOS (INCLUINDO, DENTRE OUTROS, DANOS POR PERDA DE NEGÓCIOS, PERDA DE DADOS OU PERDA DE LUCROS), EM QUALQUER CONTRATO, NEGLIGÊNCIA, RESPONSABILIDADE ESTRITA OU OUTRA HIPÓTESE DECORRENTE DE OU RELACIONADA DE QUALQUER FORMA AOS SERVIÇOS E/OU AOS MATERIAIS, INCLUINDO QUALQUER MATERIAL DISPONÍVEL POR MEIO DE QUALQUER PLATAFORMA DE TERCEIROS, ENVIOS, QUALQUER SITE COM LINK OU QUALQUER CÓDIGO, PRODUTO OU SERVIÇO ADQUIRIDO, ACESSÍVEL OU UTILIZADO POR MEIO DOS SERVIÇOS OU DE QUALQUER PLATAFORMA DE TERCEIROS. SUA ÚNICA SOLUÇÃO PARA A INSATISFAÇÃO COM OS SERVIÇOS, MATERIAIS, INCLUINDO QUAISQUER PRODUTOS OU SERVIÇOS DISPONÍVEIS POR MEIO DE QUALQUER PLATAFORMA DE TERCEIROS, ENVIOS OU QUALQUER SITE COM LINK É PARAR DE USAR OS SERVIÇOS, MATERIAIS, ENVIOS, PRODUTOS OU SITES COM LINK, CONFORME APLICÁVEL. A ÚNICA E MÁXIMA RESPONSABILIDADE EXCLUSIVA DO TABULA POR TODOS OS DANOS, PERDAS E CAUSAS DE AÇÃO, SEJA EM CONTRATO, DELITO (INCLUINDO, DENTRE OUTROS, NEGLIGÊNCIA) OU DE OUTRA FORMA, SERÁ O VALOR TOTAL PAGO POR VOCÊ AO TABULA NOS DOZE (12) MESES ANTERIORES, SE HOUVER, PARA ACESSAR OU USAR OS SERVIÇOS. COMO ALGUMAS JURISDIÇÕES NÃO PERMITEM A EXCLUSÃO OU LIMITAÇÃO DE RESPONSABILIDADE POR DANOS CONSEQUENTES OU ACIDENTAIS, A LIMITAÇÃO ACIMA PODE NÃO SE APLICAR A VOCÊ. NENHUMA COMUNICAÇÃO DE QUALQUER TIPO ENTRE VOCÊ E AO TABULA OU UM REPRESENTANTE DO TABULA CONSTITUI UMA DESISTÊNCIA DE QUALQUER LIMITAÇÃO DE RESPONSABILIDADE ORA DESCRITA OU CRIA QUALQUER GARANTIA ADICIONAL NÃO DECLARADA EXPRESSAMENTE NOS TERMOS. VÁRIAS REIVINDICAÇÕES NÃO AUMENTARÃO O LIMITE DE DANOS MONETÁRIOS INDICADO NO PRESENTE. VOCÊ CONCORDA QUE AS EXCLUSÕES DE DANOS NESTES TERMOS DE USO SERÃO APLICÁVEIS MESMO QUE QUALQUER RECURSO FALHE NO SEU PROPÓSITO ESSENCIAL.
Imprecisões. É possível que os Serviços fornecidos em qualquer Plataforma de Terceiros possam conter imprecisões ou erros, ou informações ou materiais que violem estes Termos. Além disso, existe a possibilidade de que alterações não autorizadas sejam feitas por terceiros nos Serviços disponíveis em qualquer Plataforma de Terceiros. Embora o Tabula tente garantir a integridade dos Serviços em Plataformas de Terceiros, não fazemos garantias quanto à integridade ou precisão dos Serviços. Caso surja uma situação em que a integridade ou a precisão dos Serviços seja questionada, envie uma solicitação para suporte@tabula.com.br (com a linha de assunto “Imprecisões em serviços da [nome da plataforma de terceiros]”) com, se possível, uma descrição dos Serviços que deverão ser verificados e o local (URL) onde esses Serviços podem ser encontrados em Nossos Serviços ou na Plataforma de Terceiros em questão, bem como informações suficientes para permitir que entremos em contato com Você. Tentaremos resolver Seus problemas assim que for razoavelmente possível. Para reivindicações de violação de direitos autorais, consulte nossa Política de Propriedade Intelectual.
Interrupções do Sistema. O Tabula agenda periodicamente a paralisação do sistema para os Serviços de manutenção e para outros fins. Além disso, podem ocorrer interrupções não planejadas do sistema. Você concorda que o Tabula não tem nenhuma responsabilidade e que não é responsável:
pela indisponibilidade dos Serviços, inclusive aqueles disponíveis em Plataformas de Terceiros;
por qualquer perda de materiais, dados, transações ou quaisquer outras informações ou materiais causados por essas interrupções do sistema;
pelo atraso resultante, fornecimento incorreto, ou ausência de fornecimento de dados, transações ou quaisquer outras informações ou materiais causados por tais interrupções do sistema;
ou por quaisquer interrupções causadas por quaisquer terceiros, incluindo, dentre outros, quaisquer empresas ou servidores que hospedam os Serviços, quaisquer provedores de serviços de Internet, quaisquer Plataformas de Terceiros, ou quaisquer instalações e redes de Internet.

14. Indenização
Por meio deste instrumento, Você concorda em indenizar, defender e isentar o Tabula, seus administradores, diretores, representantes, parceiros, funcionários, licenciantes, representantes e prestadores terceirizados de todos os danos, perdas, despesas, custos, reivindicações e exigências razoavelmente previsíveis, incluindo honorários advocatícios razoáveis e custos e despesas relacionados, devidos a ou decorrentes da Sua violação de qualquer representação ou garantia nos termos deste instrumento. Reservamos o direito de, às nossas próprias custas, assumir a defesa e o controle exclusivos de qualquer assunto sujeito à indenização por Você sob esta seção 14, e neste caso, Você concorda em cooperar conforme necessário com tal defesa e apoiando quaisquer defesas disponíveis.
14.1. Estatuto de Limitações.
Qualquer reivindicação ou causa de ação decorrente ou relacionada ao uso dos Serviços, aos Termos ou a quaisquer serviços ou informações disponíveis por meio de Plataformas de Terceiros deve ser apresentada no prazo de 1 ano após o surgimento de tal reivindicação ou causa de ação, independentemente de qualquer estatuto ou lei em contrário. Caso qualquer reivindicação ou causa de ação não seja apresentada dentro de um período de 1 ano, essa reivindicação ou causa de ação será impedida definitivamente.

15. Rescisão
O Tabula reserva-se o direito de rescindir, suspender, modificar ou excluir, ao Nosso critério exclusivo, qualquer:
Conteúdo Enviado, Conteúdo da Empresa, Cursos ou qualquer Serviço;
Seu acesso aos Nossos Serviços ou à Sua Conta, da seguinte maneira:
Se Você violar ou descumprir qualquer um destes Termos ou qualquer uma de Nossas políticas aplicáveis, conforme publicado em Nossos Serviços periodicamente, o Tabula poderá agir imediatamente, sem aviso prévio a Você. Se agirmos de acordo com esta seção, não teremos qualquer responsabilidade perante Você por quaisquer Cursos que Você possa ter comprado nem por qualquer outro uso de Nossos Serviços associados a Sua Conta. Para evitar qualquer dúvida, Você entende e concorda que não será compensado nem elegível para qualquer reembolso em qualquer circunstância por conta de qualquer acesso perdido a Nossos Serviços, incluindo, dentre outros, Cursos que Você possa ter comprado;
Nós também poderemos agir por qualquer motivo ou sem motivo algum e, nesse caso, você receberá um aviso prévio. Se agirmos de acordo com esta seção:
se Você for um Aluno, Nós o reembolsaremos por qualquer acesso perdido aos Cursos que Você possa ter adquirido durante o período de três (3) meses anteriores a essa rescisão, tudo de acordo com os termos de Nossa política de reembolso ora descrita e sujeito a eles;
se Você for um Professor, essa rescisão também cancelará Seu direito de oferecer Seus Cursos por meio dos Nossos Serviços, e o Tabula pagará todos os valores pendentes devidos a Você até a data de rescisão. Vale ressaltar que os Alunos que compraram seu Curso manterão o acesso ao Curso enquanto a Tabula julgar necessário.
Você poderá rescindir Seu uso dos Serviços a qualquer momento, seja deixando de acessá-los ou excluindo Sua Conta, seguindo os passos estabelecidos em nossa Política de Privacidade e sujeito aos termos nela contidos. Nós não temos nenhuma obrigação de reter nenhuma de Suas Contas ou Conteúdos Enviados por nenhum período além do que possa ser exigido pela lei aplicável. Após a rescisão, Você deverá deixar de utilizar todos os Serviços e Conteúdos. Quaisquer direitos adquiridos de pagamento e as Seções 4, 5, 11-16 e todas as representações e garantias deverão ser mantidos após a rescisão.

16. Notificações eletrônicas
Ao usar Nossos Serviços ou ao comunicar-se com o Tabula, Você concorda que o Tabula poderá se comunicar com Você eletronicamente referente a assuntos de segurança, privacidade e administração relacionados ao Seu uso dos Serviços ou a estes Termos. Se o Tabula souber de uma violação do sistema de segurança, ela poderá tentar notificá-lo eletronicamente, publicando um aviso nos Serviços ou enviando um e-mail a Você. Você pode ter o direito legal de receber este aviso por escrito. Para receber um aviso gratuito por escrito de uma violação de segurança (ou para retirar Seu consentimento para receber avisos eletrônicos), escreva para o Tabula através do suporte@tabula.com.br. O aviso será considerado fornecido vinte e quatro horas após o e-mail ter sido enviado, a menos que o remetente seja notificado de que o endereço de e-mail é inválido. Alternativamente, o Tabula pode dar a Você um aviso legal por correio para um endereço postal, se fornecido por Você por meio do Seu uso de qualquer um dos Serviços. Nesse caso, o aviso será considerado fornecido três dias após a data da postagem.

17. Diversos
17.1. Contrato Integral
Estes Termos e quaisquer políticas aplicáveis a Você publicadas em Nossos Serviços constituem o contrato integral entre as partes em relação ao objeto deste instrumento e substituem quaisquer contratos verbais ou escritos anteriores entre as partes em relação a tal objeto.
17.2. Autonomia das cláusulas
Se qualquer disposição destes Termos for considerada ilegal, nula ou inexequível, tal disposição será considerada separável destes Termos e não afetará a validade e a exequibilidade de quaisquer das demais disposições destes Termos.
17.3. Renúncia
Uma disposição destes Termos somente poderá ser dispensada por um instrumento escrito assinado pela parte que tem direito ao benefício de tal disposição. O não exercício ou execução de qualquer direito ou disposição destes Termos pelo Tabula não constituirá uma renúncia de tal direito ou disposição.
17.4. Aviso
Qualquer aviso ou outra comunicação a ser fornecida de acordo com este documento será feito por escrito e enviado por fax, carta registrada ou carta certificada com AR, ou e-mail.
17.5. Nenhuma agência
Nenhum destes Termos deve ser interpretado como a constituição de qualquer parte em sócio, joint venture, representante, representante legal, empregador, contratante ou funcionário da outra parte. Nem o Tabula nem qualquer outra parte nestes Termos terá ou manter-se-á como detentora de qualquer autoridade para fazer quaisquer declarações, representações ou acordos de qualquer tipo, ou realizar qualquer ação que esteja vinculada ao outro, exceto conforme previsto neste contrato ou autorizado por escrito pela parte vinculada.
17.6. Legislação em vigor
Estes Termos e o uso dos Serviços feito por Você serão regidos pelas leis substantivas da República Federativa do Brasil, sem referência à sua escolha ou conflitos de princípios legais que exijam a aplicação das leis de outra jurisdição, e serão considerados como tendo sido elaborados e aceitos na República Federativa do Brasil.

18. Contrato de arbitragem e renúncia de ação coletiva
Antes de protocolar um processo legal formal, primeiro tente entrar em contato com nossa equipe de suporte em suporte@tabula.com.br. A maioria das disputas podem ser resolvidas dessa maneira.
18.1. Ambos concordamos em arbitrar
Se não pudermos resolver nossa disputa amigavelmente, Você e o Tabula concordam em resolver quaisquer reivindicações relacionadas a estes Termos, ou qualquer um dos Nossos outros termos publicados em Nossos Serviços periodicamente, por meio de uma arbitragem final e vinculativa. Isso aplica-se a todos os tipos de reivindicações sob qualquer teoria legal.
Qualquer um de Nós poderá apresentar uma reivindicação no tribunal de pequenas causas ou em algum outro lugar decidido de comum acordo por nós, se ela se qualificar para ser tratada neste tribunal.
Além disso, se Você ou o Tabula trouxer uma reivindicação ao tribunal que deva ser arbitrada ou se qualquer um de Nós se recusar a arbitrar uma reivindicação que deva ser arbitrada, a outra parte poderá pedir a um tribunal para Nos forçar a comparecer à arbitragem para resolver a reivindicação (ou seja, obrigar a arbitragem). Você ou o Tabula também poderá pedir a um tribunal para suspender um processo judicial enquanto um processo de arbitragem estiver em curso.
18.2. Ausência de ação coletiva
Estamos todos de acordo que só podemos apresentar uma reivindicação contra a outra parte individualmente. Isso significa que:

Nem Você nem o Tabula podem apresentar uma reivindicação como autor da ação ou membro de classe em uma ação coletiva, ação consolidada ou ação representativa;
Um árbitro não pode combinar a reivindicação de mais de uma pessoa em um único caso e não pode presidir qualquer processo de arbitragem consolidada, de classe ou representativa (a menos que ambos concordemos em mudar isso);
A decisão de um árbitro ou a sentença no caso de uma pessoa só pode afetar a pessoa que apresentou a reivindicação, e não os demais Usuários, e não pode ser usada para decidir outras disputas com outros Usuários. Se um tribunal decidir que esta subseção sobre “Ausência de ação coletiva” não é aplicável ou válida, então toda a Seção 18 (Contrato de arbitragem e renúncia de ação coletiva) será nula e sem efeito, mas, o restante dos Termos ainda continuará aplicável.
18.3. O processo de arbitragem
Qualquer disputa entre Você e o Tabula referente aos Serviços que envolva uma reivindicação de menos de R$ 10.000,00 (dez mil reais) deverá ser resolvida exclusivamente por meio de arbitragem vinculativa não presencial. A parte que optar pela arbitragem deverá instaurar um processo protocolando uma demanda de arbitragem na [escrever o órgão responsável por este tipo de processo]. O processo de arbitragem será regido pelas Regras de Arbitragem Comercial do [escrever o órgão responsável por este tipo de processo], pelos Procedimentos Complementares para a Resolução de Disputas Relacionadas ao Consumidor. Além disso, Você e o Tabula concordam que as seguintes regras são aplicáveis ao processo de arbitragem:

A arbitragem será conduzida, por decisão da parte que busca remediação, por telefone, pela Internet ou com base unicamente em apresentações por escrito;
A arbitragem não deve envolver qualquer comparecimento das partes ou de testemunhas, a menos que acordado mutuamente de outra forma entre as partes;
Qualquer julgamento sobre a sentença proferida pelo árbitro pode ser inscrito em qualquer tribunal de jurisdição competente. Quaisquer disputas entre Você e o Tabula referentes aos Serviços que envolvam uma reivindicação de menos de R$ 10.000 devem ser resolvidas de acordo com as regras da[escrever o órgão responsável por este tipo de processo]sobre a necessidade de uma audiência de arbitragem presencial.
18.4. Jurisdição para disputas coletivas não sujeitas à arbitragem
Se o Contrato de arbitragem for considerado inválido ou inexequível ou para quaisquer disputas que não se qualifiquem para a arbitragem, a disputa estará sujeita à jurisdição exclusiva dos tribunais Federal e Estadual localizados em São Paulo, São Paulo. Por meio do presente, Você consente com a jurisdição pessoal e exclusiva desses tribunais, e submete-se a ela para os fins de litígio de tal ação.
18.5. Alterações
Não obstante às provisões relacionadas a modificações acima, se o Tabula alterar esta seção do “Contrato de arbitragem e renúncia de ação coletiva” após a data da primeira aceitação destes Termos (ou da aceitação de quaisquer alterações subsequentes destes Termos), você poderá rejeitar qualquer alteração desse tipo fornecendo ao Tabula um aviso por escrito de tal rejeição por correio ou pessoalmente no endereço: Rua Pamplona, 1616, 01405-022 – Jardim Paulista – São Paulo – SP – Brasil ou enviando um e-mail usando o endereço associado a sua Conta para: suporte@tabula.com.br, dentro de 30 dias a partir da data da efetivação de tal alteração, conforme indicado pelo texto “última atualização em” acima. Para ser validado, o aviso deverá conter seu nome completo e indicar claramente sua intenção de rejeitar as alterações desta seção do “Contrato de arbitragem e renúncia de ação coletiva”. Ao rejeitar as alterações, você concorda que será arbitrado a qualquer conflito entre você e o Tabula de acordo com as provisões desta seção do “Contrato de arbitragem e renúncia de ação coletiva” a partir da data da primeira aceitação destes Termos (ou da aceitação de quaisquer alterações subsequentes destes Termos).

19. Cursos de Saúde
Ao comprar, registrar e/ou participar de qualquer curso(s) de saúde, eventos, atividades e outros programas (“Curso(s) de saúde”), pelo presente, o usuário confirma, em seu nome e de seus herdeiros, representantes pessoais e/ou cessionários, que existem riscos e perigos inerentes devido à árdua natureza do(s) curso(s) de saúde.
O usuário confirma que optou por participar voluntariamente de um programa de exercício físico. O usuário confirma que o Tabula e os Professores dos Curso de Saúde recomendam que o usuário consulte um médico antes de iniciar qualquer Curso de Saúde.
O usuário também confirma que alguns desses riscos não podem ser eliminados, independentemente do cuidado tomado para evitar lesões.
O usuário também confirma que os riscos específicos variam entre atividades, mas variam de:

lesões secundárias, como arranhões, contusões e torções;
lesões primárias, como lesão nos olhos ou perda de visão, lesões nas articulações ou nas costas, ataques cardíacos e concussões;
lesões catastróficas, como paralisia e óbito.
Em todos os momentos, o usuário cumprirá as condições declaradas e habituais, os sinais ou as sinalizações de segurança, as regras e as instruções verbais fornecidos a você. Pela contrapartida de poder participar de, e ter acesso ao(s) curso(s) de saúde, pelo presente, o usuário:

concorda em assumir total responsabilidade por toda e qualquer lesão ou dano que o usuário sofra ou agrave em relação ao(s) curso(s) de saúde;
libera, indeniza e isenta o professor do curso de saúde, o Tabula, suas sociedades coligadas e seus franqueados, e cada um dos seus respectivos membros, funcionários e representantes e agentes, e cada um dos seus respectivos sucessores e cessionários e todas as outras partes de quaisquer responsabilidades, reivindicações, ações, procedimentos, custos, despesas, indenização por perdas e danos e obrigações, na medida do permitido por lei, resultantes de ou associados, de qualquer maneira, com a participação em curso(s) de saúde, e declara que (i)não tem qualquer condição médica ou física que o impeça de utilizar adequadamente qualquer curso de saúde, (ii)não tem uma condição física e mental que o colocaria em qualquer perigo físico ou médico, (iii)não recebeu recomendação médica para não realizar exercícios físicos.
O usuário confirma que se tiver qualquer incapacidade ou condição crônica, o usuário estará correndo risco ao participar do(s) curso(s) de saúde, e não deve participar em nenhuma aula.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "termos-e-condicoes"
            ], [
                "name"       => "Política de Privacidade",
                "desc"	 => "Esta Política de Privacidade foi atualizada pela última vez em 24 de julho de 2017.
Todos os termos usados que estão em letras maiúsculas e não definidos de outra forma no presente documento terão o significado que lhes é atribuído nos Termos de Uso do Tabula.
O Tabula (“Nós”, “Nos” ou “Nossa”) respeita Seus direitos a respeito de Sua privacidade e informações e fornecemos esta Política de Privacidade (“Política de Privacidade”) para ajudá-lo a entender como reunimos, usamos, compartilhamos, armazenamos e divulgamos informações que obtemos de ou sobre Você ao utilizar os Serviços. Esta Política de Privacidade é aplicada quando Você utiliza Nossos Serviços onde fornecemos um link para esta Política de Privacidade, salvo indicação diferente oferecida em outro link para uma política diferente. Esta Política de Privacidade também descreve as opções disponíveis para Você em relação ao uso, Seu acesso e como atualizar e corrigir Suas informações.
Conforme utilizado neste documento, o termo “uso” ou “utilização” significará uso, acesso, instalação, cadastro, conexão, download, visita ou navegação dos Serviços.
ESTE É UM CONTRATO LEGALMENTE VINCULANTE ENTRE VOCÊ E O TABULA, E, POR MEIO DO USO DOS SERVIÇOS, VOCÊ CONCORDA COM OS TERMOS DESTA POLÍTICA DE PRIVACIDADE E COM OS TERMOS E CONDIÇÕES DE USO. Você deverá analisar esta Política de Privacidade e os Nossos Termos e Condições de Uso, além de qualquer outro contrato ou política fornecida por Nós que seja de Seu uso de Serviços.
Você deverá rever esta Política de Privacidade com Nossos Termos de Uso e qualquer outro contrato ou política fornecida por Nós que rege Seu uso dos Serviços.
1. Informações que Você Nos fornece diretamente

O Tabula pode coletar informações diferentes de ou sobre Você, dependendo da maneira pela qual Você utiliza os Serviços. Os exemplos a seguir são fornecidos para lhe ajudar a entender melhor as informações que podemos coletar por meio da Utilização dos Serviços.
Lembre-se que o Tabula não é responsável pela forma como outras pessoas utilizam informações publicamente disponíveis ou, de outra forma, acessíveis a outras pessoas que têm acesso aos Serviços.
Quando Você se inscreve e utiliza os Serviços (inclusive por meio de uma Plataforma de Terceiros) Nós coletaremos qualquer informação que Você nos fornece diretamente, como a seguinte:
Informações de Registro:

Para utilizar determinadas funcionalidades dos Serviços, tais como comprar ou registrar-se para um Curso, você deverá registrar-se e, nesse caso, recolheremos e armazenaremos quaisquer Informações de Registro que nos tenha fornecido, tais como e-mail, senha, data de nascimento e idade, e lhe atribuiremos um número de identificação único (“Informações de Registro”).
Informações do Perfil:

Você também poderá optar por fornecer informações adicionais sobre você mesmo, incluindo mas não limitado a uma foto, título, link de site, perfis de mídia social ou outras informações que você desejar inserir (“Informações do Perfil”) para criar um perfil (“Perfil”). Suas Informações de Perfil e Perfil estarão publicamente visíveis para outras pessoas.
Postagem Pública/Conteúdo Compartilhado:

Alguns dos Serviços permitirão que Você interaja com outros Usuários e/ou publique, compartilhe, comunique ou transmita conteúdo publicamente, como comentários em uma página do Curso, enviar mensagens a outras pessoas ou publicar fotos (coletivamente “Conteúdo Compartilhado” ou “Postagem Pública”). Podemos coletar e armazenar Postagens Públicas e Conteúdo Compartilhado. O Conteúdo Compartilhado ou as Postagens Públicas podem estar publicamente disponíveis ou visíveis aos outros, dependendo de onde esse conteúdo é publicado.
Por este meio Você concede ao Tabula um direito não exclusivo e licença para reproduzir, distribuir, executar publicamente, oferecer, comercializar, usar e explorar as Postagens Públicas e Conteúdo Compartilhado.
Informações sobre o curso:

O Tabula permite que você se inscreva e faça cursos on-line sobre uma variedade de tópicos que são ensinados por professores onde, entre outras coisas, você verá revisões de cursos feitos por outros. Nós coletamos informações relativas a cursos, incluindo, sem limitação a: curso, trabalhos e atividades de avaliação, interações com os Professores de Curso, Assistentes de Ensino e outros Alunos, respostas a perguntas, ensaios e outros itens submetidos para satisfazer os requisitos do Curso (“Informação de Curso”).
Você concorda com o Nosso compartilhamento de Informações de Registro, Informações de Perfil e Informações de Cursos aos professores e Assistentes de Ensino. O Tabula não fornece os endereços de e-mail dos Alunos aos Professores ou Assistentes de Ensino. O Tabula não controla como os Professores ou Assistentes de Ensino tratam Informações de Registro, Informações de Perfil ou Informação de Curso e não são responsáveis pelo uso de tais informações pelos Professores ou Assistentes de Ensino.
Informações sobre pagamento:

Se você fizer compras por meio de Nossos Serviços, tais como Cursos, poderemos coletar certas informações relacionadas à Sua compra (como Seu nome e CEP) conforme necessário para processar Seu pedido de compra. Você deverá fornecer informações de pagamento e faturamento diretamente aos Nossos parceiros de processamento de pagamentos, incluindo, mas não limitado, a Seu nome, informações de cartão de crédito, endereço de faturamento e CEP. Nós não acessamos, armazenamos ou recolhemos Suas informações de cartão de crédito.
Informações recebidas por meio da Sua Plataforma de Terceiros:

Ao Utilizar Nossos Serviços por meio de uma Plataforma de Terceiros, Você nos permite coletar e usar certas Informações do Perfil ou de conta da Sua Plataforma de Terceiros, conforme permitido pelos termos da Plataforma de Terceiros, e Suas configurações de privacidade e de acordo com esta Política de Privacidade.
A título de exemplo, podemos coletar algumas ou todas as seguintes informações da Sua conta da Plataforma de Terceiros quando você se registra ou utiliza os Serviços ou por meio de uma Plataforma de Terceiros:
Seu nome completo
A foto do Seu Perfil ou o URL
O número do Seu RG, que está vinculado a informações publicamente disponíveis, tais como Seu nome e foto de Perfil
O endereço de e-mail de login
Sua localização e a de Seus dispositivos de acesso, incluindo qualquer dispositivo sem fio
Seu gênero
Sua data de aniversário
Lista de amigos ou contatos

Você pode optar por não permitir que a Plataforma de Terceiros nos forneça certas informações sobre Você, mas talvez não seja possível usar determinados recursos de Nossos Serviços se Você habilitar tais restrições.
Sorteios, promoções e pesquisas:

De tempos em tempos, podemos solicitar que você complete uma pesquisa e/ou lhe oferecer a oportunidade de participar de promoções e/ou sorteios (coletivamente, “Promoções”) por meio dos Serviços ou por meio de uma Plataforma de Terceiros. Se você optar por participar de uma Promoção, coletaremos e armazenaremos as informações que você fornecer sobre Sua participação na Promoção, incluindo, mas não limitado a, Seu nome, endereço de e-mail, data de nascimento e/ou telefone número. Tais informações estarão sujeitas a esta Política de Privacidade, salvo disposição em contrário nas regras ou diretrizes oficiais da Promoção ou em outra política de privacidade que regerá a Promoção. As informações que coletamos em conexão com uma Promoção serão utilizadas para administrar a Promoção, tais como notificar os vencedores e distribuir prêmios. Conforme permitido pelas leis vigentes, Suas informações também poderão ser utilizadas pelo Tabula ou pelo patrocinador da Promoção para fins de marketing.
A Sua entrada na Promoção poderá resultar na adição de Suas informações à Nossa lista de discussão, bem como à lista de discussão de Nossos parceiros das Promoções. A aceitação de um prêmio pode exigir que você (a menos que seja proibido por lei) nos permita postar publicamente algumas de Suas informações por meio de Nossos serviços, como na página de um vencedor. Em alguns casos, um anunciante ou patrocinador de terceiros poderá operar ou hospedar uma Promoção em Nossos Serviços ou por meio dos Nossos Serviços e recolher as Suas informações. Nos casos em que Não somos o patrocinador ou o operador da Promoção, não temos controle sobre as informações coletadas e, antes de participar, você deverá rever as regras oficiais, bem como a política de privacidade do anunciante ou do patrocinador aplicável à Promoção. Todas as Nossas Promoções são destinadas a maiores de idade em Seu respectivo estado, província ou país, a menos que expressamente indicado de outra forma.
Comunicações, solicitações de suporte, abuso potencial:

Se você entrar em contato conosco para obter ajuda ou relatar um problema, preocupação, abuso potencial ou outros problemas relacionados aos Serviços, inclusive antes de ter criado uma Conta, poderemos coletar e armazenar Suas informações de contato, comunicação e/ou outras informações sobre Você, Incluindo mas não se limitando a Seu nome, endereço de e-mail, localização, sistema operacional, endereço IP, quaisquer outras informações que você nos forneça no curso de tais comunicações e/ou outras informações que possam ser coletadas por meios automatizados conforme descrito na Seção 2 deste documento. Reservamo-nos o direito de realizar mais pesquisas e obter informações adicionais, conforme necessário. Usaremos as informações para responder a Você e pesquisar Sua solicitação/comunicação, tudo de acordo com as disposições desta Política de Privacidade.
2. Informações que Nós coletamos por meios automatizados
Dados Técnicos e de Uso

Quando Você acessa os Serviços, incluindo a navegação em Nossos Cursos, coletamos determinadas informações por meios automatizados. Essas informações podem incluir, sem limitação:
informações técnicas sobre Seu computador ou Dispositivo Sem Fio, como Seu endereço IP, tipo de dispositivo, tipo e versão de sistema operacional, ID de dispositivo exclusivo, navegador, idioma do navegador, domínio e outros sistemas, tipos de plataforma (coletivamente, “Informações Técnicas”);
estatísticas de utilização sobre a Sua interação com os Serviços, incluindo os Cursos acessados, o tempo gasto em páginas ou os Serviços, páginas visitadas, consultas de pesquisa, dados de cliques, partes dos Serviços utilizados, data e hora e outras informações relativas à Sua utilização Dos Serviços (coletivamente, “Dados de Uso”).

Estas informações técnicas e dados de utilização, que podem estar ligados às Suas informações, são coletados pela utilização de diretórios de registro do servidor e tecnologias de rastreio, incluindo:
cookies, que são pequenos arquivos que os sites enviam ao Seu computador ou dispositivo sem fio para identificar de forma exclusiva o Seu navegador ou dispositivo móvel ou para armazenar informações na configuração do Seu navegador;
web beacons, que são objetos pequenos que nos permitem medir as ações dos visitantes que usam os Serviços. Para obter informações mais detalhadas sobre como usamos cookies e outras tecnologias, consulte as informações adicionais nesta Política de Privacidade na seção “Nossa Política de Cookies” e revise a Política de Cookies completa do Tabula ainda nesta página, após a seção18.

Informações sobre Geolocalização: Os endereços IP recebidos do Seu navegador ou dispositivo podem ser utilizados para determinar a Sua localização aproximada, como a cidade, estado e/ou país associado a um endereço IP.
3. Cookies e Ferramentas de Coleta de dados

Como muitos sites e provedores de aplicativos, o Tabula (e/ou prestadores de serviços que atuam em Nosso nome, como o Google Analytics e/ou Nossos anunciantes de terceiros) podem utilizar arquivos de log do servidor e ferramentas automatizadas de coleta de dados, tais como cookies, tags, scripts, impressões digitais de navegador (coletivamente, “Ferramentas de Coleta de Dados”) quando Você acessa e utiliza Nossos Serviços. Em alguns casos, vinculamos as informações coletadas por esses meios às Nossas outras informações que você fornece e que coletamos conforme descrito nesta Política de Privacidade. Essas ferramentas de coleta de dados rastreiam e coletam automaticamente determinadas informações técnicas e dados de uso que Seu navegador envia quando você usa Nossos serviços. Em alguns casos, associaremos essas informações técnicas e dados de uso a outras informações sobre você.
Utilizamos cookies para uma várias coisas, incluindo:
analisar o uso de Nossos Serviços;

proporcionar uma experiência mais personalizada;

permitir que você faça login mais facilmente para usar Nossos Serviços;

e ajudar a tornar o Seu uso dos Nossos Serviços mais eficiente e mais valioso, fornecendo-lhe uma experiência personalizada e reconhecendo-o quando você retornar.

Também podemos empregar web beacons ou outras tecnologias por uma variedade de razões, tais como:
para sabermos se determinada página foi visitada ou se um e-mail foi aberto;

para anunciarmos de modo mais eficiente excluindo nossos Usuários atuais de determinadas mensagens promocionais ou identificando a origem de uma nova instalação.

O Tabula usa os seguintes tipos de cookies:
Preferências. Usamos cookies de preferências para lembrar informações sobre o Seu navegador e como Você prefere usar Nosso Serviço, ou seja, para lembrar Suas configurações preferidas que afetam a experiência de como Nossos serviços o veem ou se comportam ao acessar e/ou usá-los, como linguagem preferida. Os cookies de preferência tornam a Sua experiência de interagir com os Nossos Serviços mais funcionais e personalizados de acordo com as Suas preferências.
Segurança. Usamos cookies de segurança para permitir que você faça login e acesse Nosso serviço, proteja Sua conta contra logins fraudulentos de terceiros e ajude a detectar, combater e proteger contra o uso indevido ou desautorizado de Sua conta.
Funcionais. Usamos cookies funcionais para tornar a experiência de usar os Nossos Serviços melhor, como lembrar o volume no qual Você gosta de reproduzir Seus vídeos.
Sessão. Usamos cookies de sessão para coletar informações sobre como Você interage com Nossos Serviços, para nos ajudar a melhorar Nossos Serviços, bem como para melhorar Sua experiência de navegação. Também usamos cookies de sessão para lembrar Seus detalhes de login e para poder processar Suas compras dos Cursos. Eles são considerados estritamente necessários ao funcionamento dos Serviços. Se elas estiverem desativadas, várias funcionalidades de Nossos Serviços serão quebradas.
Você pode configurar Seu navegador para avisá-lo sobre cookies, limitar os tipos de cookies que você permite ou recusar cookies; No entanto, você poderá não conseguir utilizar algumas ou todas as funcionalidades dos Serviços, ou a Sua experiência será diferente ou menos funcional se recusar/desativar os cookies.
Terceiros com quem Nós nos associamos para fornecer determinados recursos em Nosso site poderão usar Objetos de Armazenamento Local, também conhecidos como Flash Cookies (Local Storage Objects, LSOs) para coletar e armazenar informações. Alguns navegadores podem oferecer Suas próprias ferramentas de gerenciamento para remover LSOs. Para gerenciar os LSOs fornecidos pelo Adobe, clique aqui.
Ao utilizar os Nossos Serviços, Você concorda com Nosso uso de cookies, web beacons, LSOs e outras Ferramentas de Coleta de Dados, conforme descrito nesta Política de Privacidade. Para obter mais informações, consulte a Política de Cookies do Tabula disponível nesta página, após a seção 18.

4. Análises.

Podemos usar o navegador de terceiros e serviços de análise móvel em Nosso Serviço, incluindo, mas não se limitando a, Google Analytics, Full Contact, Hotjar e Intercom. Esses provedores de serviços usam o tipo de tecnologia descrita acima para nos ajudar a analisar como os usuários usam os Serviços, incluindo a observação do site de terceiros de onde você chega, a frequência com que você usa os Serviços, os eventos que ocorrem no Serviço, os dados de uso, Dados de desempenho e onde o aplicativo foi baixado.
As informações coletadas serão divulgadas ou coletadas diretamente por esses provedores de serviços, e Utilizamos essas informações para melhorar os Serviços, entender melhor a funcionalidade dos Serviços em um computador ou outro dispositivo e fornecer informações que possam ser de Seu interesse.
Por exemplo, o Hotjar gera mapas de calor (heatmaps) de experiências de usuário e registros, em uma base não identificada, informações sobre Sua atividade, como cliques do mouse, movimentos do mouse, atividade de rolagem, bem como texto que Você digita nos Serviços, tais como pesquisas de Cursos.
Você tem algumas escolhas sobre o uso dessas análises. Por exemplo, para evitar que o Google Analytics utilize Suas informações para análise, você pode instalar o Complemento de navegador de exclusão do Google Analytics clicando aqui; para desativar o uso do Hotjar de Suas informações para análise, clique aqui.
5. Publicidade on-line

Podemos usar tecnologias de publicidade de terceiros que permitam a exibição de publicidade sobre Nossos Serviços em outros sites que você visita e outras aplicações que você utiliza. Os anúncios podem ser baseados em vários fatores, como o conteúdo da página que você está visitando, informações que você digita, como Sua idade e sexo, Suas pesquisas, dados demográficos, conteúdo gerado pelo usuário e outras informações que coletamos de Você. Esses anúncios podem ser baseados em Sua atividade atual ou Sua atividade ao longo do tempo e em outros sites e serviços on-line, e podem ser adaptados aos Seus interesses.
Usamos terceiros (por exemplo, redes de anúncios e servidores de anúncios, como o Google Analytics e outros) para ajudar a distribuir esses anúncios personalizados em outros sites e em aplicativos para dispositivos móveis. Esses terceiros podem colocar cookies ou outras tecnologias de rastreamento em Seu computador, telefone celular ou outro dispositivo para coletar informações sobre o Seu uso dos Serviços, conforme mencionado acima e podem acessar esses cookies ou outras tecnologias de rastreamento em Seu computador, telefone celular ou outros Dispositivo que você utiliza para acessar os Serviços, a fim de veicular esses anúncios personalizados. Também podemos compartilhar com anunciantes de terceiros uma versão combinada de Seu endereço de e-mail, exclusivamente em forma não legível e conteúdo que você compartilha publicamente ao usar os serviços (por exemplo, conteúdo gerado pelo usuário) para fins de publicidade personalizada.
Nós não temos acesso, nem esta Política controla, o uso de cookies ou outras tecnologias de rastreamento que podem ser colocados em Seu computador, telefone celular ou outro dispositivo que você usa para acessar os Serviços por tecnologia de anúncios não filiada e de terceiros, Servidores de anúncios, redes de anúncios ou quaisquer outros terceiros não afiliados. Os sites que usam essas tecnologias podem oferecer a você uma forma de desativar a segmentação de anúncios, conforme descrito abaixo. Você pode receber publicidade personalizada em Seu computador por meio de um navegador da Web. Se você estiver interessado em obter mais informações sobre a publicidade personalizada do navegador e como você geralmente pode controlar cookies que forem colocados em Seu computador para oferecer publicidade sob medida, Você pode visitar o link de cancelamento de assinatura pelo consumidor da Network Advertising Initiative ou o link de cancelamento de assinatura pelo consumidor da Digital Advertising Alliance para optar por não receber publicidade sob medida de empresas que participam desses programas. Para desativar a exibição de publicidade do Google Analytics ou personalizar anúncios de rede de exibição do Google, Você pode visitar a página de configuração do Google Ads.
Lembre-se que, na medida em que a tecnologia de publicidade estiver integrada aos Serviços, Você ainda poderá receber anúncios em outros Web sites e aplicações móveis, mesmo que opte por não participar. Nesse caso, a publicidade não será adaptada aos Seus interesses. Além disso, não controlamos nenhum dos links excluídos acima ou se alguma empresa em particular opta por participar desses programas de exclusão. Nós não somos responsáveis por quaisquer escolhas que você faça usando esses mecanismos ou pela disponibilidade ou precisão continuada desses mecanismos.
6. Nossa Política em relação a crianças

Reconhecemos os interesses de privacidade das crianças e encorajamos os pais e responsáveis a assumirem um papel ativo nas atividades e interesses on-line de Seus filhos. Crianças menores de 13 anos, ou 16 se essas crianças residirem no Espaço Econômico Europeu, não deverão utilizar nem tentar utilizar Nossos Serviços. Se soubermos que coletamos informações pessoais (conforme definido pela lei vigente) de uma criança menor de 13 anos, ou de uma criança com menos de 16 anos na Espaço Econômico Europeu, tomaremos medidas para excluir essas informações.
Os pais que acreditam que o Tabula possa ter coletado informações pessoais de uma criança menor de 13 anos poderão enviar pedido para privacidade@tabula.com.br e solicitar que a informação seja removida.
7. Como Usamos as Informações que Coletamos

O Tabula pode utilizar as informações que coletamos para uso dos Serviços para:
Fornecer, administrar e facilitar o uso dos Serviços, inclusive para exibir conteúdo personalizado;
Processar ou preencher Seus pedidos e/ou encomendas de Cursos, produtos, serviços, informações ou recursos;
Nos comunicarmos com Você a respeito de Sua conta via: (i)Responder às Suas perguntas ou interesses, (ii)Enviar mensagens e informações administrativas e de serviço a Você, incluindo comentários de Professores ou Assistentes de Ensino, Sobre alterações ao Serviço e atualizações para Nossos Termos de Uso e Política de Privacidade, (iii)Enviar por e-mail informações ou fornecer mensagens no aplicativo sobre o Seu progresso em Cursos, programas de recompensas, novos serviços, novos recursos, promoções, boletins informativos e outros cursos disponíveis, dos quais você pode desativar a qualquer momento, (iv)Enviar notificações por “push” ao dispositivo sem fios para fornecer atualizações e outras mensagens relevantes. Você pode gerenciar notificações “push” na página “opções” ou “configurações” do aplicativo móvel;
Compreender e melhorar os Serviços e desenvolver novos produtos, serviços ou recursos;
Permitir comunicação e interação entre usuários;
Gerenciar Suas preferências de Conta, estabelecer Seu Perfil e Informações de Registro;
Facilitar o funcionamento técnico dos Serviços, incluindo, sem limitação, a solução e resolução de problemas, proteger os Serviços; e prevenir fraudes e abusos;
Responder a perguntas e problemas de suporte ao cliente e resolver disputas;
Criar, revisar, analisar e compartilhar informações técnicas;
Analisar as tendências e o tráfego do Usuário, acompanhar compras e informações de utilização;
Anunciar Nossos Serviços em sites de terceiros ou aplicativos móveis
Comercializar, processar ou preencher Promoções administradas ou patrocinadas pelo Tabula;
Solicitar feedback dos usuários;
Conforme exigido ou permitido por lei;
A Nosso exclusivo critério, determinamos o que será necessário para garantir a segurança e/ou integridade de Nossos Usuários, funcionários, terceiros, público e/ou Nossos Serviços;
Identificar usuários únicos entre dispositivos; ou
Adaptar anúncios em dispositivos.
8. Quando e como divulgamos/compartilhamos Suas informações com terceiros

Nós compartilhamos Suas informações, que poderão incluir Informações de Registro, Informações de Perfil e conteúdo compartilhado e informações do curso, com os seguintes terceiros ou sob as circunstâncias a seguir, ou ainda conforme descrito nesta Política de Privacidade:
8.1. Sobre Você com o Professor:
Podemos compartilhar informações sobre o curso, trabalhos e atividades de avaliação, bem como certas Informações de Registro e Informações de Perfil com Professores ou Assistentes de Ensino dos cursos em que você se inscreve ou para os quais solicita informações. Se você se comunicar com um Professor, por exemplo, para fazer uma pergunta, esse Professor será capaz de ver Seu nome. Não compartilharemos Seu endereço de e-mail com Instrutores.
8.2. Terceiros parceiros de negócios, provedores de serviços, contratados ou agentes
Podemos compartilhar Suas informações com empresas terceirizadas que prestam serviços em Nosso nome, incluindo processamento de pagamentos, realização de pedidos, análise de dados, serviços de marketing, serviços de publicidade (incluindo, mas não limitado a, publicidade redirecionada), e-mail e serviços de hospedagem e Serviços ao cliente e suporte. Um exemplo dessas empresas de terceiros inclui, mas não se limita, a Pay Pal e PagSeguro.
Podemos também compartilhar Suas informações com empresas terceirizadas com as quais nos associamos para fornecer determinados Serviços a Você, incluindo mas não limitado a Saint Paul Escola de Negócios, Academia de Varejo, Ibevar, GoIntegro e Contax. A coleta e utilização de informações por parte destes parceiros está sujeita às políticas de privacidade e outros termos destes. Você deve rever essas Políticas de Privacidade, termos e outros contratos.
8.3. Sobre você com outros usuários
Como mencionado acima, Suas Informações de Perfil poderão ser publicamente visíveis, inclusive a outros Usuários. Além disso, se você fizer uma pergunta a um Professor, as informações sobre você, como Seu nome, poderão ser vistas publicamente por outros Usuários.
8.4. Serviços de análise e de enriquecimento de dados
Como mencionado acima, usamos análises de terceiros como o Google Analytics, o Facebook Pixel e o Hotjar para ajudar a entender Seu uso de Nossos serviços e melhorar Nosso serviço. Podemos fornecer Suas informações de contato, Informações de registro, informações técnicas, dados de uso ou dados não identificados ou serviços de enriquecimento de dados que correspondam a essas informações com informações de banco de dados publicamente disponíveis, incluindo informações de contato e informações sociais de outras fontes, como endereço de e-mail, sexo, empresa, Título profissional, fotos, URLs de sites, identificadores de redes sociais e endereços físicos. Usamos essas informações combinadas para nos comunicar com você de uma maneira mais eficaz e personalizada.
8.5. Transferências comerciais, vendas, fusões ou desinvestimentos
No caso de alguma transição comercial com o Tabula, tal como uma fusão, aquisição, alienação ou dissolução (incluindo falência), ou venda de todo ou parte dos Seus ativos, poderemos partilhar, divulgar ou transferir todas as Suas informações para a empresa sucessora durante a transição ou em etapas (por exemplo, durante auditoria jurídica).
8.6. Com Sua permissão
Nós poderemos compartilhar informações com o Seu consentimento.
8.7. Informações agregadas ou não identificadas
Podemos divulgar ou usar informações agregadas ou não identificadas para qualquer finalidade.
8.8. Promoções
Podemos compartilhar Suas informações em conjunto com qualquer Promoção que você insira nos Serviços, conforme necessário, para administrar, comercializar, patrocinar ou preencher a Promoção ou, conforme exigido legalmente por normas ou regulamentos vigentes (por exemplo, fornecer listas de vencedores ou fazer os registros exigidos) ou de acordo com as regras aplicáveis da Promoção. Podemos compartilhar Suas informações com terceiros auxiliando-nos na administração da Promoção.
8.9. Anúncios de serviços/produtos de terceiros
Embora, atualmente, não ofereçamos publicidade nos Serviços, se viermos a oferecê-la futuramente, poderemos usar e compartilhar com terceiros anunciantes (e outros terceiros) determinadas Informações Técnicas, Informações de uso e/ou Informações Agregadas para mostrar informações demográficas gerais e de preferência entre nossos Usuários. Também podemos permitir que os anunciantes coletem Informações Técnicas ou Informações Agregadas, que possam compartilhar conosco, por meio do uso de tecnologias de rastreamento, como cookies e web beacons. As informações coletadas poderão ser utilizadas para oferecer seleção e entrega de anúncios segmentados, a fim de personalizar a experiência do usuário, aumentando a probabilidade de que os anúncios de produtos e serviços visualizados sejam atrativos a você, uma prática conhecida como publicidade comportamental, e para realizar análise na web (ou seja, para analisar o tráfego e outras atividades do usuário final para melhorar Sua experiência). Observe que isso não o exclui de anúncios veiculados. Você continuará a receber anúncios genéricos. Não controlamos as ferramentas de exclusão acima e não somos responsáveis por Sua operação ou pelas empresas que optam por participar desses programas.
8.10. Recursos de mídia social
Características de mídia social Nossos Serviços podem incluir recursos de mídia social, como o botão “Facebook”. Nossa integração desses recursos pode permitir que a mídia social fornecida por terceiros colete certas informações, como Seu endereço IP, a página que você está visitando ao usar Nossos serviços e para definir um cookie para ativar o recurso para funcionar corretamente. Os recursos de mídia social são hospedados por terceiros ou hospedados diretamente pelo uso de Nossos Serviços. Suas interações com esses recursos são regidas pela política de privacidade da empresa que o fornece.
8.11. Segurança, cooperação com a aplicação da lei e cumprimento de obrigações legais
Podemos divulgar as Suas informações a terceiros, se, a Nosso exclusivo critério, acreditarmos de boa fé que a divulgação é:
permitida ou exigida por lei;
solicitada em conjunto com ou relevante a um inquérito judicial, governamental ou judicial, investigação, ordem ou processo;
exigido ou razoavelmente necessário, de acordo com uma intimação válida, mandado ou outra solicitação ou solicitação legalmente válida;
razoavelmente necessário para impor os Nossos Termos de Uso, esta Política de Privacidade ou quaisquer outros contratos legais;
necessários para detectar, prevenir ou tratar fraudes, abusos, potenciais violações da lei (ou regra/regulamento) e/ou questões de segurança ou técnicas;
ou necessários ou razoavelmente necessários à Nossa discrição para proteger contra danos iminentes aos direitos, propriedade ou segurança do Tabula, Nossos Usuários, funcionários, membros do público e/ou Nossos Serviços. Também podemos divulgar informações sobre Você a Nossos auditores ou consultores jurídicos em conjunto com o acesso às Nossas obrigações de divulgação e/ou direitos sob a égide desta Política.
9. Como mantemos Suas informações seguras?

O Tabula toma medidas de segurança adequadas para proteger-se contra o acesso não autorizado, a alteração não autorizada, a divulgação ou a destruição de dados que Você compartilha e que coletamos e armazenamos. Estas medidas variam com base na sensibilidade dos dados que coletamos e armazenamos. Infelizmente, contudo, nenhum sistema pode ser 100% seguro, e Não conseguimos garantir que as comunicações entre Você e o Tabula, os Serviços ou qualquer informação fornecida a Nós, em conjunto com as informações que coletamos por meio dos Serviços, estejam livres de acesso não autorizado por terceiros. A entrada ou o uso não autorizado, a falha de hardware ou de software, inclusive outros fatores, podem comprometer a segurança das informações do Usuário a qualquer momento. Sua senha é um componente importante do Nosso sistema de segurança. Assim, é Sua responsabilidade protegê-la. Não compartilhe Sua senha com terceiros. Se Sua senha for comprometida por algum motivo, você deverá alterá-la imediatamente e entrar em contato com suporte@tabula.com.br em caso de quaisquer preocupações.
10. Suas escolhas em relação ao uso de Suas informações

Você sempre poderá optar por não fornecer certas informações para Nós, mas poderá não conseguir utilizar certos Serviços. Se você não deseja receber comunicações promocionais, você poderá optar por:
enviar um e-mail para suporte@tabula.com.br;
seguir as instruções de cancelamento da inscrição fornecidas na comunicação promocional que Você recebe;
ou gerenciar Suas preferências de e-mail fazendo login em Sua Conta, clicando no link Configurações da Conta no botão Seu Perfil no cabeçalho do site e navegando até a guia Notificações.
Observe que, apesar da Opção de exclusão ou das preferências de e-mail indicadas, continuaremos a enviar-lhe mensagens de transação e/ou relacionamento relacionadas aos Serviços, incluindo, por exemplo, confirmações administrativas, confirmação de pedidos, atualizações importantes sobre os Serviços e Políticas.
O navegador que você usa pode lhe dar condições de controlar os cookies ou outros tipos de armazenamento de dados. O dispositivo sem fio poderá fornecer opções sobre como e se o local ou outros dados são coletados e compartilhados. O Tabula não controla essas opções, ou configurações padrão, que são oferecidas pelos fabricantes de Seu navegador ou sistema operacional de dispositivo móvel.
Para evitar que o Google Analytics use Suas informações, você poderá instalar o complemento de desativação do Google Analytics clicando aqui. Para desativar o uso de Suas informações pelo Hotjar, clique aqui. Para desativar o uso de Suas informações pelo Facebook Pixel, Você precisa desconectar seu perfil no navegador que estiver usando.
Você também pode ter outras opções, conforme descrito na seção Anúncios de serviços/produtos de terceiros.
Se você tiver alguma dúvida sobre Suas informações, sobre o uso dessas informações ou sobre os Seus direitos quando se trata de qualquer um dos itens acima, entre em contato conosco em privacidade@tabula.com.br.
11. Como você acessa e atualiza Suas informações

Você poderá acessar e atualizar as informações que o Tabula coleta e mantém das seguintes maneiras:
Você poderá atualizar as informações que Você fornece diretamente ao Tabula fazendo login em Sua Conta e atualizando as informações da Sua Conta a qualquer momento. Você também poderá enviar quaisquer pedidos de acesso aos Seus dados pessoais para privacidade@tabula.com.br ou por escrito a Rua Pamplona, 1616 – 01405-002 – Jardim Paulista – São Paulo – SP – Brasil . Aguarde até 30 (trinta) dias para obter uma resposta.
Para gerenciar as informações que o Tabula recebe sobre Você por meio de uma Plataforma de Terceiros ou Dispositivo Sem Fio, siga as instruções fornecidas pela Plataforma de Terceiros ou Provedor de Dispositivo Sem Fio para atualizar Suas informações e alterar Suas configurações de privacidade. Quando o Tabula recebe Suas informações por meio de uma Plataforma de Terceiros ou Dispositivo Sem Fio, essas informações são armazenadas e utilizadas pelo Tabula de acordo com esta Política de Privacidade.
12. Como Excluir Sua Conta e o que Acontece Quando Sua Conta é Encerrada ou Excluída

12.1. Desativando sua conta
Você (Aluno ou Professor) deverá entrar em contato conosco pelo e-mail suporte@tabula.com.br e faremos esforços comercialmente razoáveis para responder ao Seu pedido dentro de 3 dias úteis.
12.2. Conta encerrada ou deletada
Conta encerrada ou deletada, lembre-se de que, mesmo depois que Sua conta for encerrada ou deletada, algumas ou todas as Suas informações poderão ainda permanecer visíveis para outras pessoas, incluindo, mas não se limitando a, qualquer informação que tenha sido:
incorporada nos Conteúdos de outros usuários, comentários, postagens, formulários de entrada, incluindo, mas não limitados a, comentários do Curso;
copiados, armazenados ou disseminados por outros Usuários;
compartilhado ou divulgado por Você ou por outros, como em uma postagem pública;
ou publicado em uma Plataforma de Terceiros. O encerramento de Sua Conta não resultará na remoção de informações coletadas e já colocadas em forma agregada ou informações que não possam, a Nosso exclusivo critério, ser removidas sem ônus indevido ao Tabula. O Tabula poderá não ser capaz e/ou obrigada a remover quaisquer das Suas informações de uma Plataforma de Terceiros.

Mesmo depois que você excluir Sua Conta ou Sua Conta for encerrada, poderemos reter Suas informações, desde que tenhamos um propósito legítimo de fazê-lo e de acordo com a legislação vigente. Além disso, Suas informações não poderão ser excluídas dos servidores da Plataforma de Terceiros que você utiliza para acessar Nossos Serviços. Podemos conservar cópias de segurança de Suas informações em Nossos servidores ou bancos de dados (e/ou em quaisquer servidores ou bancos de dados autorizados de terceiros que usamos) para fins legítimos, como ajudar com quaisquer obrigações legais, resolver disputas e impor Nossos contratos. Essas informações poderão ser divulgadas de acordo com esta Política de Privacidade, independentemente de Sua Conta ter sido excluída ou encerrada.
13. Modificações nesta Política de Privacidade

Podemos atualizar esta Política de Privacidade de tempos em tempos. Se fizermos qualquer alteração material a esta Política de Privacidade Nós o notificaremos conforme exigido pela lei vigente. As alterações entrarão em vigor na data de Sua publicação, salvo indicação em contrário.
Caso continue acessando ou utilizando os Serviços após a data de vigência referente a qualquer alteração, tal acesso ou uso será interpretado como aceitação e concordância em cumprir e vincular-se aos Termos do Instrutor com suas alterações vigentes. A Política de Privacidade revista substitui todas as Políticas de Privacidade anteriores. Por esta razão, encorajamos você a revisar esta Política de Privacidade sempre que utilizar os Serviços. A Nossa solicitação, Você concorda em aceitar ou assinar uma versão não eletrônica desta Política de Privacidade e quaisquer outras políticas ou acordos estabelecidos ou disponíveis por meio de qualquer Plataforma de Terceiros.
14. Operações Internacionais: Uma nota aos usuários fora do Brasil

O Tabula armazena informações sobre os visitantes de Nossos Serviços e Usuários em servidores localizados no Brasil. Ao utilizar Nossos Serviços, você concorda com o armazenamento de Suas informações dentro do Brasil. Se você estiver utilizando os Serviços fora do Brasil, saiba que os dados e informações pessoais que enviar serão transferidos para servidores no Brasil. A proteção de dados e outras leis do Brasil podem não ser tão abrangentes como as do Seu país. Ao enviar os Seus dados e/ou utilizar os Nossos Serviços, o Cliente concorda com a transferência, armazenamento e processamento dos Seus dados nos e para o Brasil.
15. Seus termos específicos

O Tabula designou o seguinte Gestor de Política de Privacidade para proteger Sua privacidade, responder às Suas perguntas, receber comentários e/ou resolver disputas relacionadas à Nossa política de privacidade:
Designado: Securato, CEO
Departamento: Política de Privacidade
e-mail: privacidade@tabula.xyz
Endereço: Rua Pamplona, 1616 – 01405-002 – Jardim Paulista – São Paulo – SP – Brasil
16. Perguntas

Não hesite em contatar-nos enviando uma solicitação para privacidade@tabula.com.br contendo qualquer pergunta, preocupação ou contestação que você possa ter em relação à nossa Política de privacidade. Coloque “Política de privacidade” na linha de assunto para que sua mensagem possa ser direcionada à(s) pessoa(s) certa(s). Você também poderá nos contatar enviando sua correspondência para Rua Pamplona, 1616 – 01405-002 – Jardim Paulista – São Paulo – SP – Brasil .
Se você tiver uma questão de privacidade não resolvida, ou de uso de dados que não tenhamos solucionado satisfatoriamente, entre em contato conosco através do e-mail suporte@tabula.com.br.
Política de Cookies do Tabula

Data de vigência: 2017
O que são cookies?

Cookies são pequenos arquivos de texto colocados em Seu computador ou dispositivo enquanto navega na Internet. Os cookies podem ser usados para coletar, armazenar e compartilhar bits de informações sobre Suas atividades em sites e serviços, inclusive no Tabula. Eles também nos permitem lembrar coisas sobre Sua visita ao Tabula, como a Sua língua preferida e outras opções/configurações e geralmente tornam o site mais fácil para você usar.
O Tabula usa cookies de sessão e cookies persistentes. Um cookie de sessão é usado para identificar uma visita específica ao Tabula. Esses cookies expiram após um curto período de tempo ou quando você fecha o navegador depois de usar o Tabula. Usamos esses cookies para identificá-lo durante uma única sessão de navegação, como quando você entra no Tabula. Um cookie persistente permanecerá em Seus dispositivos por um período de tempo especificado no cookie. Usamos esses cookies onde precisamos identificá-lo por um longo período de tempo. Por exemplo, usaremos um cookie persistente se você pediu para manter-lhe conectado.
Por que o Tabula usa cookies e tecnologias semelhantes?

O Tabula usa cookies e tecnologias similares, como web beacons, cookies de navegador, tags de pixel ou Objetos de Armazenamento Local (“Flash Cookies”), para fornecer, medir e melhorar Nossos serviços de várias maneiras. Usamos cookies tanto quando você acessa Nosso site e serviços em um navegador, como por meio de Nosso aplicativo móvel nativo. À medida que adotamos tecnologias adicionais, podemos também coletar informações adicionais por meio de outros métodos.
Utilizamos cookies para as seguintes finalidades:
Autenticação e segurança:
Para fazer login no Tabula;
Para Sua segurança;
Para nos ajudar a detectar e combater o spam, o abuso e outras atividades que violam os acordos e os termos do Tabula.

Por exemplo, essas tecnologias ajudam a autenticar Seu acesso ao Tabula e impedir que pessoas não autorizadas acessem Suas contas.
Preferências:
Para lembrar informações sobre o Seu navegador e Suas preferências; e
Para lembrar Suas configurações e outras escolhas que você fez.

Por exemplo, os cookies nos ajudam a lembrar o Seu idioma preferido ou o país em que se encontra. Podemos então fornecer-lhe conteúdo no Seu idioma preferido sem ter que perguntar-lhe cada vez que visitar o Tabula.
Análise e pesquisa:
Para nos ajudar a melhorar e entender como as pessoas utilizam o Tabula.

Por exemplo, os cookies nos ajudam a testar diferentes versões do Tabula para ver quais recursos ou conteúdo os usuários preferem. Podemos incluir web beacons em mensagens de e-mail ou newsletters para determinar se a mensagem foi aberta e para outras análises. Podemos também otimizar e melhorar Sua experiência no Tabula usando cookies para ver como você interage com o Tabula, como quando e quantas vezes você usa e em quais links você clica.
Para nos ajudar a entender melhor como as pessoas usam o Tabula, trabalhamos com vários parceiros de análise, incluindo Google Analytics e Mixpanel. Esses provedores utilizam cookies e tecnologias similares para nos ajudar a analisar como os usuários usam os Serviços, incluindo a indicação dos Serviços terceiros de onde você vem. As informações coletadas serão divulgadas ou coletadas diretamente por esses provedores de serviços, que usam as informações para avaliar o uso que você faz do Tabula. Para impedir que o Google Analytics use Suas informações para análise, você pode instalar o plugin de desativação do Google Analytics clicando aqui, e você também poderá utilizar a desativação do Mixpanel clicando aqui.
Não divulgamos as informações coletadas de Nossos próprios cookies a terceiros, exceto aos Nossos provedores de serviços que nos ajudam nessas atividades.
Conteúdo Personalizado:
Para personalizar o Tabula com conteúdo mais relevante.

Publicidade:
Para lhe fornecer mais publicidade relevante.

Como explicado mais adiante em Nossa Política de Privacidade, Terceiros cujos produtos ou serviços são acessíveis ou anunciados por meio do Tabula podem usar cookies para coletar informações sobre Suas atividades nos Serviços, em outros sites e/ou nos anúncios nos quais você clicou. Essas informações poderão ser utilizadas por eles para veicular anúncios que eles acreditem ter maior probabilidade de lhe causar interesse e para medir a eficácia de Seus anúncios. Os cookies direcionados e de publicidade que utilizamos podem incluir Google Analytics, AdRoll, AppNexus e outras redes de publicidade e serviços que usamos periodicamente.
Para obter mais informações sobre cookies direcionados e cookies de publicidade e sobre como você pode optar por sair, acesse youronlinechoices.eu ou allaboutcookies.org/manage-cookies/index.html. Observe que, na medida em que a tecnologia de publicidade é integrada ao Tabula, você ainda pode receber conteúdo publicitário, mesmo que você opte por não receber publicidade personalizada. Nesse caso, o conteúdo da publicidade apenas não será adaptado aos Seus interesses. Além disso, não controlamos nenhum dos links de exclusão acima mencionados e não somos responsáveis por quaisquer escolhas feitas com esses mecanismos ou pela disponibilidade ou precisão continuada desses mecanismos.
Ao usar um aplicativo móvel, você também poderá receber anúncios customizados no aplicativo. Cada sistema operacional, como iOS e Android, fornece Suas próprias instruções sobre como evitar anúncios personalizados no aplicativo. Você pode rever os materiais de suporte e/ou as configurações de privacidade para os respectivos sistemas operacionais, a fim de optar por anúncios sob medida no aplicativo. Para outros dispositivos e/ou sistemas operacionais, veja as configurações de privacidade para o dispositivo ou sistema operacional ou entre em contato com o operador da plataforma.
Quais são as minhas opções de privacidade?

Você tem várias opções para controlar ou limitar como Nós e Nossos parceiros utilizamos cookies.
Esta política de cookies está disponível em Nosso site. Ao continuar a usar ou acessar o Tabula, você está concordando com o uso de cookies e tecnologias relacionadas, conforme descrito nesta Política de cookies.
A maioria dos navegadores aceita cookies automaticamente, mas você pode modificar Sua configuração do navegador para recusar cookies, visitando a seção Ajuda da barra de ferramentas do Seu navegador. Se optar por recusar cookies, lembre-se que poderá não conseguir iniciar sessão, personalizar ou utilizar algumas das funcionalidades interativas do Tabula.
Os Flash Cookies funcionam de forma diferente dos cookies do navegador, e as ferramentas de gerenciamento de cookies disponíveis em um navegador da Web não removerão os Flash Cookies. Para saber mais sobre como gerenciar Flash Cookies, você pode visitar o site da Adobe e fazer as alterações em Global Privacy Settings Panel(painel de configurações de privacidade global).
● Para obter informações gerais sobre cookies e como desativá-los, visite www.allaboutcookies.org.
Perguntas

Se você tiver alguma dúvida sobre o uso de cookies, envie um e-mail para suporte@tabula.com.br.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "politica-de-privacidade"
            ], [
                "name"       => "Política de Propriedade Intelectual",
                "desc"	 => "1. Notificação e procedimento para queixa de violação de direito autoral ou de propriedade intelectual

O Tabula respeita a Propriedade Intelectual de outros e leva a sério a proteção de direitos autorais e toda propriedade intelectual, e pedimos aos nossos professores, alunos e outros usuários de nosso site e nossos serviços (o “Site”) que façam a mesma coisa. Atividades desrespeitosas no Site ou por meio dele não serão toleradas.
A Política de Propriedade Intelectual do Tabula destina-se a:
remover material que o Tabula crê, de boa-fé, mediante notificação do detentor da propriedade intelectual ou de seu representante, estar violando a propriedade intelectual de um terceiro ao ser disponibilizado por meio do Site;
remover qualquer Conteúdo Enviado publicado no Site por “infratores reincidentes”. O Tabula considera um “infrator reincidente” qualquer Usuário que tenha carregado Conteúdo Enviado, no Site, e para o qual o Tabula tenha recebido mais de dois pedidos de remoção de tal Conteúdo Enviado. O Tabula tem, no entanto, poder para encerrar a conta de qualquer Usuário após o recebimento de uma única notificação de suposta violação ou mediante determinação do próprio Tabula.
2. Procedimento para reportar uma suposta violação.

Se você acredita que qualquer conteúdo disponibilizado no Site ou por meio do Site foi usado ou explorado de uma forma que infrinja o direito de propriedade intelectual que você possui ou controla, envie imediatamente uma “Notificação de Suposta Violação” contendo a seguinte informação ao Representante Designado identificado abaixo. Sua comunicação deve incluir substancialmente o seguinte:
Uma assinatura física ou eletrônica de uma pessoa autorizada a agir em nome do proprietário do(s) trabalho(s) que foi(ram) ou está(ão) sendo supostamente violado(s);
Identificação dos trabalhos ou materiais sendo violados ou, se vários trabalhos forem englobados em uma única notificação, uma lista representativa de tais trabalhos;
Identificação do material específico que está sendo supostamente violado ou alvo de atividade infratora e que deve ser removido ou ter o acesso a si desabilitado, juntamente com informações suficientes para que o Tabula possa localizar o material;
Informações suficientes para que o Tabula possa contatar você, como um endereço, número telefônico e, se disponível, um endereço de correio eletrônico pelo qual você possa ser contatado;
Uma declaração de que você acredita de boa-fé que o uso do material na forma reclamada não está autorizado pelo proprietário do direito autoral, por seu representante ou pela lei;
Uma declaração de que as informações na notificação são precisas e de que, sob pena de perjúrio, você está autorizado a agir em nome do proprietário de um direito exclusivo que supostamente está sendo violado

.
Você deve consultar seu próprio advogado e/ou consultar a Lei de Direitos Autorais nº 9.610 para confirmar suas obrigações em fornecer uma notificação válida de suposta violação.
3. Informações de contato do Representante Designado.

O Representante Designado do Tabula para notificações de suposta violação pode ser contatado:
Via e-mail: contato@tabula.com.br
Via Correios do Brasil: Rua Pamplona, 1616 – 01405-002 – Jardim Paulista – São Paulo – SP – Brasil.
4. Contra-notificação

Se você receber uma notificação do Tabula informando que o material disponibilizado por você no ou por meio do Site foi alvo de uma Notificação de Suposta Violação, você terá o direito de fornecer ao Tabula uma “Contra-notificação”. Para ser válida, a Contra-notificação deve estar por escrito, ser enviada ao Representante Designado da Empresa por meio de um dos métodos elencados acima e incluir essencialmente as seguintes informações:
Uma assinatura física ou eletrônica do assinante;
Identificação do material que foi removido ou teve o acesso desabilitado e a localização desse material antes de ser removido ou ter o acesso desabilitado;
Uma declaração, sob pena de perjúrio, de que o assinante crê, de boa-fé, que o material foi removido ou desabilitado em consequência de engano ou de má identificação do material a ser removido ou desabilitado; e
Nome, endereço e telefone do assinante, e uma declaração de que o assinante concorda com a jurisdição do Tribunal Distrital Federal para o distrito judicial no qual o endereço está localizado, ou, se o endereço do assinante estiver fora dos Estados Unidos, para qualquer distrito judicial no qual a Empresa possa ser encontrada, e de que o assinante aceitará a citação da pessoa que forneceu a notificação acima ou de um representante dessa pessoa.

A parte que envia a Contra-notificação deve consultar um advogado ou a Lei de Direitos Autorais nº 9.610 para confirmar suas obrigações em fornecer uma Contra-notificação válida.
5. Notificações de suposta violação ou contra-notificações falsas.

A Lei de Direitos Autorais nº 9.610 determina que o criador de toda obra intelectual deve ser recompensado pelo uso dessa produção, então qualquer pessoa que, conscientemente, apresente declaração falsa, nos termos de Direitos Autorais, de que material ou atividade é violador, ou de que material ou atividade foi removido ou desabilitado por engano ou má identificação, será responsável por quaisquer danos, inclusive por honorários e custos advocatícios, sofridos pelo suposto violador, por qualquer proprietário de direito autoral ou licenciador autorizado deste ou por um provedor de serviços que seja prejudicado por tal declaração falsa, como resultado de o [Tabula] confiar em tal declaração falsa para remover ou desabilitar o acesso a material ou atividade supostamente violador, ou para substituir o material removido ou cessar a desabilitação de acesso a ele.
O Tabula reserva-se o direito de exigir compensação de qualquer parte que envie notificação de suposta violação ou contra-notificação em violação à lei.
Para evitar dúvidas, apenas notificações apresentadas nos termos da Digital Millennium Copyright Act (Lei dos Direitos Autorais do Milênio Digital) e dos procedimentos previstos nesta seção devem ser enviadas ao Representante Designado em contato@tabula.com.br ou ao endereço postal identificado acima. Quaisquer outros comentários, elogios, reclamações ou sugestões sobre o Tabula, a operação do Site ou qualquer outro assunto devem ser enviados a suporte@tabula.com.br.
6. Marca comercial

Procedimento para envio de Notificação de Violação de Marca Comercial
A maneira mais fácil de efetuar uma reclamação de violação de marca comercial é enviar uma notificação contendo as informações a seguir ao Representante Designado identificado abaixo. Note que uma cópia da sua notificação será enviada à parte que publicou o conteúdo reportado por você. Seu comunicado deve incluir, essencialmente, o seguinte:
Suas informações completas de contato (nome, endereço de correspondência e número telefônico, completos)
O elemento específico (palavra, símbolo, etc.) sobre o qual você reivindica os direitos de marca comercial.
A fundamentação para a sua reivindicação de direitos de marca comercial (como um registro nacional ou comunitário), incluindo o número do registro, se aplicável.
O país ou a jurisdição em que você reivindica os direitos de marca comercial.
A categoria de bens e/ou serviços para a qual você assevera os direitos.
Informações suficientes para nos permitir localizar no Tabula o material que, no seu entender, viola os direitos da sua marca comercial. A maneira mais fácil de fazer isso é fornecer endereços da internet (URLs) que levem diretamente ao suposto conteúdo infrator.
Uma descrição de como, no seu entender, esse conteúdo viola sua marca comercial.

Se você não for o titular dos direitos, uma explicação de sua relação com o titular dos direitos.
A seguinte declaração: “Eu creio, de boa-fé, que o uso supracitado da marca comercial, na forma reclamada, não está autorizado pelo proprietário da marca registrada, por seu representante nem pela lei”
A seguinte declaração: “As informações nesta notificação são precisas, e declaro, sob pena de perjúrio, que sou o proprietário ou estou autorizado a agir em nome do proprietário de uma marca comercial supostamente violada”.
Sua assinatura física ou eletrônica.",
                "created_at" => $now,
                "updated_at" => $now,
                "urn"        => "politica-de-propriedade-intelectual"
            ], 
        ]);
    }
}
