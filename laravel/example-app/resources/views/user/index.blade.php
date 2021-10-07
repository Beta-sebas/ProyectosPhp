@extends('templates.template')

@section('titulo', 'Gestion de usuarios')

@section('encabezado', 'Lista de usuarios')

@section('contenido')

    <?php
    print '<a href="'.route('user.create').'">Crear Usuario</a>';
    ?>

    <table>
        <tr>
            <th>idusuario</th>
            <th>nombre</th>
            <th>login</th>
            <th colspan="2">Accion</th>

        </tr>
        <?php

            
            foreach ($datos as $user) {
                
                print"  
                    <tr>
                    <td>$user->idusuario</td>
                    <td>$user->nombre</td>
                    <td>$user->login</td>";

                    print '<td>'.link_to_route('user.edit', $title = 'Edit', $parameters = ['user'=>$user->idusuario]).'
                    
                    </td> 
                    ';
                    print '<td>'.link_to_route('user.destroy', $title = 'Eliminar', $parameters = ['user'=>$user->idusuario]).'
                    
                    </td></tr> 
                    ';
                        
            }
        ?>
       
    </table>

@endsection