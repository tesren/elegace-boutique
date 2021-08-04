<div class="col-12 col-lg-7 text-start" id="comments">

    <?php if( have_comments() ): ?>
        
         <ol class="comment-list ps-0">
             <?php 

             //$replytext = pll_e('Responder');
             
             $args = array(
                 'walker'       => new comment_walker(),
                 'max_depth'    => '2',
                 'style'        => 'ol',
                 'callback'     => null,
                 'end-callback' => null,
                 'type'         => 'all',
                 'reply-text'   => 'Responder',
                 'page'         => '',
                 'per_page'     => '',
                 'avatar_size'  => '',
                 'reverse_top_level'=> true,
                 'reverse_children'=> true,
                 'echo'         => true,


             );
             
             wp_list_comments($args); ?>
         </ol>


            <!--comentarios cerrados-->
           <?php if(!comments_open() && get_comments_number() ): ?>
                <p><?php echo 'Comentarios Cerrados'; ?></p>
           <?php endif;?>
       <?php
        else:?>
            <span class="d-block my-5 text-center fs-2">Aún no hay comentarios</span>
        <?php endif;?>

    <div class="text-center form-comentarios">
        <?php 

            //traducciones
             $nombre = 'Nombre';
            $email  = 'Correo';
            $website='Sitio Web';
            //$labelSubmit= pll_e('Enviar');
            //$titleReply= pll_e('Deja un comentario');

            $fields = array(

                'author' => '<div class="form-group text-start mb-3"><label for="author">' . __( $nombre, 'domainreference' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required /></div>',
                    
                'email' => '<div class="form-group text-start mb-3"><label for="email">' . __( $email, 'domainreference' ) . '</label> <span class="required">*</span><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required /></div>',
                    
                'url' =>'<div class="form-group text-start last-field mb-3"><label for="url">' . __( $website, 'domainreference' ) . '</label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',

                'cookies'=> '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label for="wp-comment-cookies-consent">Guarde mi nombre, correo electrónico y sitio web en este navegador para la próxima vez que comente.</label></p>',
				
            );

            $argsf = array(
                'label_submit'=>'Enviar',
                'title_reply' => 'Deja un comentario',
                'comment_notes_before'   =>  'Su dirección de correo electrónico no se publicará. Los campos obligatorios están marcados *',
                'class_submit'=> 'mb-5 mt-3 w-100 btn btn-outline-secondary fs-4',
                'comment_field'=> '<div class="form-group text-start mb-3"><label for="comment">' . _x( 'Comentario', 'noun' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control mb-3" name="comment" rows="4" required></textarea></p>',
                'fields'      => $fields,
            );
    
            comment_form($argsf); ?>
    </div>
</div>