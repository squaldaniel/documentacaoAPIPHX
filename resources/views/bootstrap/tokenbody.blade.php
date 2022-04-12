@extends('bootstrap.model')
@section('body')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Passos Iniciais:
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Inicialmente para que possa utilizar nossa API, é necessário obter um <code ><strong>usuário</strong></code> com permissão de API com a equipe Técnica da PHX. Você pode enviar um e-mail para <span class="link link-primary">ti@pxservices.com<span>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Endpoint de acesso
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <p>Após contato com a equipe técnica e de posse de seu usuário de API, é precisso preencher corretamente o Payload de requisição. Est como no exemplo abaixo:</p>
          <pre class="text text-danger">
            {
                "grant_type": "password",
                "client_id": 1,
                "client_secret": "1VZlziQ8J2obtEg1NByxxnC4DJqq6BeXs2Lxgkry",
                "username": "${seu_usuario}",
                "password": "${sua_senha}",
                "scope": "*"
            }
          </pre>
          <p>Substituindo as variáveis ${} por seu valor obtido com a equipe. veja o exemplo abaixo:</p>
          <pre class="text text-success">
            {
                "grant_type": "password",
                "client_id": 1,
                "client_secret": "1VZlziQ8J2obtEg1NByxxnC4DJqq6BeXs2Lxgkry",
                "username": "joao.da.silva@empresa.com.br",
                "password": "$b@atat1nh4",
                "scope": "*"
            }
          </pre>
          <p>Através do verbo <span class="text text-success"><b></i>POST</i></b></span>, faça uma requisiçaõ para o endpoint:</p>
          <p class="text text-success"><b></i>https://dev.phxservices.com/oauth/token</i></b></p>
          <p>Você deverá obrter algo semelhante a :</p>
            <pre>
                {
                    "token_type": "Bearer",
                    "expires_in": 86400,
                    "access_token": "eyJ0eXAiiIp0aSI6IjgyZG...WujO7sLR315dYZtqed6_1iRZDwVGBzjc98ZiweS5_E",
                    "refresh_token": "def5020...6d90b73e4860"
                }
            </pre>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Autorização
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <p>Após obter o token, será necessário informar em suas requisições posteriores, no Heeader o Token e seu prefix</p>
          <pre class="text text-warning">
            Content-Type: application/json
            Authorization: Bearer ${token_obtido}
          </pre>
          <p>Como no Exemplo:</p>
            <pre class="text text-success">
                Content-Type: application/json
                Authorization: Bearer eyJ0eXAiiIp0aSI6IjgyZG...WujO7sLR315dYZtqed6_1iRZDwVGBzjc98ZiweS5_E
            </pre>
        </div>
      </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingfour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
            Enviando Houses
          </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Com o Token, agora é possivel enviar suas informações de Houses. Resaltamos que mesmo que seja apenas 1 (um) envio, é necessário que o mesmo esteja dentro de um array de informações como no exemplo abaixo:</p>
            <pre >
                [
                    {
                    "Airport Origin": "MIA",
                    "MAWB": "",	
                    "BAG_NUMBER": "",	
                    "HAWB": "04753029299",	
                    "Account Number": <span class="text text-danger">${"*"}</span>, 
                    "contract": <span class="text text-danger">${"*"}</span>,	
                    "PaymentType": "DDP",	
                    "Type Service": "ST",
                    "Modal": 7,	
                    "Shipper_Type_Tax_Id": "CNPJ",	
                    "Shipper_Tax_Id": "16578946523490",	
                    "Shipper_CompanyName": "Marcelo Benevides",	
                    "ShipperFrom": "Marcelo Benevides mascarenhas",	
                    "ShipperAddress": "2670 NW 84th Ave apt 209",
                    "Shipper_AdditionalInfo": "2670 NW 84TH AVE APT 209",	
                    "Shipper_ZipCode": "33122",	
                    "Shipper_Telephone": "30 5343 8453",	
                    "Shipper_Country": "ESTADOS UNIDOS",	
                    "Shipper_State": "EX",	
                    "Shipper_Province": "9707",	
                    "shipperbairro": "Nevada",	
                    "Shipper_Email": "testemarcelo@teste.com",	
                    "Consignee_Type_Tax_Id": "CPF",	
                    "Consignee_Tax_Id": "999.999.999-99",	
                    "Consignee_CompanyName": "Marcos Antonio Costa do Nascimento",	
                    "AttentionTo": "MARCOS ANTONIO COSTA DO NASCIMENTO",	
                    "ConsigneeAddress": "Rua Rio de Janeiro. numero 663 - Casa",	
                    "consigneebairro": "Botafogo",	
                    "Consignee_AdditionalInfo": ".",	
                    "Consignee_ZipCode": "65903-030",	
                    "Consignee_Telephone": "99 99901 2688",	
                    "Consignee_Country": "BRAZIL",	
                    "Consignee_State": "Maranhao",	
                    "Consignee_Province": "Imperatriz",	
                    "Consignee_Email": "CS@PHXSERVICES.COM",	
                    "Weight": "0.14",	
                    "Comercial Value": "32.00",	
                    "Description": "Hard Disk computer/",	
                    "Quantity": "1",	
                    "Freight": "2.88",	
                    "Length": "15.24",	
                    "Width": "15.24",	
                    "Height": "5.08",	
                    "Integration type": "EXP"
                    }
                     ]                     
            </pre>
                <p > Siga como o exemplo acima. pode inlusive copiar este <code><b>json</b></code> e mudar com suas informações verdadeiras.</p>
                <p ><code>*</code> Essas informações lhe serão passadas, junto com seu usuário e senha.</p>
          </div>
        </div>
      </div>
  </div>
@endsection