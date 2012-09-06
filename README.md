
fadaloader
=============

FileADvanced upLoader, é uma classe em PHP que permite o envio de arquivos de forma segura e fácil.


## Specs
* Feito no SO: Mac OS X 10.6 (a.k.a. Snow Leopard)
* Testado no SO: Mac OS X, Ubuntu 10.04 LTS, Ubuntu Server 10.04 LTS
* Linguagem Utilizada: PHP


## HowTo
Primeiro configure o formulário que receberá os arquivos:

```
echo $fadaloader->generateForm('fadaloader','fadaloader','fadaloader','','POST','10','file','Enviar Arquivos!');
```

$fadaloader->generateForm(NAME,ID,CLASS,ACTION,METHOD,N FIELDS,FIELD NAME,SUBMIT LABEL);


Enviando os arquivos:

```
$fadaloader->upload();
```


Exibindo o status de envio:

```
echo $fadaloader->status();
```


### Configurando o fadaloader
Após a 'configuração' do formulário, algumas coisas devem ser ajustadas para o seu uso:

* Caminho
* Extensões permitidas
* Tamanho máximo permitido


#### Caminho
Para definir qual o caminho onde ficam os arquivos, altere a linha 3

```
public $path = 'uploads';
```

Utilize permissão 0755 para o usuário do web server

```
$ chmod 755 uploads
$ chown www-data.www-data uploads
```


#### Extensões permitidas
Para definir quais extensões são permitidas, altere a linha 21

```
$allowed_ext = array('jpg', 'jpeg', 'png', 'pdf');
```

As extensões devem estar entre aspas simples ou duplas e por vírgulas


#### Tamanho de arquivos
Para definir qual o tamanho máximo permitido, altere a linha 37

```
if ($file_size > 2097152) {
```

O tamanho informado deve estar em bytes
