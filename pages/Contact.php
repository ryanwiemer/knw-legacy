<?php
/**
 * Template Name: Contact Page
 * Description: A Page Template for the Contact Page
 */
get_header(); ?>

<div class="hero hero--purple">
  <h2 class="hero__title"><?php echo get_the_title(); ?></h2>
</div>
<div class="content">

<form class="form" method="post" name="contact" novalidate="novalidate">
  <p class="form__intro">Please feel free to contact me with comments, questions or to schedule your shoot. I also love to collaborate with other creative individuals on new projects, so please drop me a line.</p>
  <fieldset>
    <div class="form__name">
      <label class="form__name__label" for="name">Name</label>
      <input class="form__name__input" name="name" type="text"/>
    </div>

    <div class="form__email">
      <label class="form__email__label" for="email">Email</label>
      <input class="form__email__input" name="email" type="text"/>
    </div>

    <div class="form__message">
      <label class="form__message__label" for="message">Message</label>
      <textarea class="form__message__textarea" name="message" type="text"></textarea>
    </div>

    <div class="form__bot">
      <label class="form__bot__label" for="bot">Spam Filter (Leave Blank)</label>
      <input class="form__bot__input" name="bot" type="text"/>
    </div>

    <input class="form__submit btn" name="submit" type="submit" value="Send" />
  </fieldset>
  <div class="form__success">
      Message sent successfully!
    </div>
    <div class="form__error">
      Error, please try again.
    </div>
</form>
<?php get_footer(); ?>
