<?php
class Alertas 
{
    public static function Sucesso()
    {
        echo "<script>
                Swal.fire({
                    title: 'Sucesso',
                    text:  'Cadastro Realizado Com Sucesso!',
                    icon:  'success'
                });
              </script>";
    }

    public static function Error()
    {
        echo "<script>
                Swal.fire({
                    title: 'Error',
                    text:  'Algo Deu Errado,Informe o T.I.',
                    icon:  'error'
                });
              </script>";
    }

    public static function Igual()
    {
        echo "<script>
                Swal.fire({
                    title: 'Error',
                    text:  'Cpf ja Cadastrado No Sistema',
                    icon:  'warning'
                });
              </script>";
    }
}

?>