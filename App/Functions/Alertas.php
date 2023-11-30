<?php
class Alertas 
{
    public static function Sucesso()
    {
        echo "<script>
                Swal.fire({
                    title: 'Sucesso!',
                    text:  'Cadastro Realizado Com Sucesso!',
                    icon:  'success'
                });
              </script>";
    }

    public static function Error()
    {
        echo "<script>
                Swal.fire({
                    title: 'Error!!!',
                    text:  'Algo Deu Errado,Informe o T.I.',
                    icon:  'error'
                });
              </script>";
    }

    public static function Igual()
    {
        echo "<script>
                Swal.fire({
                    title: 'Error!!!',
                    text:  'Cpf ja Cadastrado No Sistema',
                    icon:  'warning'
                });
              </script>";
    }
    public static function Altera()
    {
        echo "<script>
                Swal.fire({
                    title: 'Sucesso!',
                    text:  'Alterado Com Sucesso!',
                    icon:  'success'
                });
              </script>";
    }
    public static function Deletar()
    {
        echo "<script>
                        Swal.fire({
                            title: 'Do you want to save the changes?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Save',
                            denyButtonText: `Don't save`
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                            Swal.fire('Saved!', '', 'success');
                            } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info');
                            }
                        });
            </script>";
    }

    public static function na()
    {
        echo "<script>
                Swal.fire({
                    title: 'Error!!!',
                    text:  'Não Existe Histórico Dessa Empilhadeira',
                    icon:  'error'
                });
            </script>";
    }

    public static function cpf()
    {
        echo "<script>
                    Swal.fire({
                        title: '<strong>Atenção</strong>',
                        icon: 'info',
                        html: `Não Existe CPF Cadastrado No Sistema!`,
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: `
                        <a href='?pagina=cadastropessoa' style='color: white'></i> Adicionar!
                        `,
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        cancelButtonText: `<a href='?pagina=entradavisita' style='color:white'>Voltar</a>`,
                        cancelButtonAriaLabel: 'Thumbs down'
                    });
    </script>";
    }
}

?>