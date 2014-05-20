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
      <input class="form__name__input" name="name" required="" type="text" value="" />
    </div>

    <div class="form__email">
      <label class="form__email__label" for="email">Email</label>
      <input class="form__email__input" name="email" required="" type="text" value="" />
    </div>

    <div class="form__message">
      <label class="form__message__label" for="Message">Message</label>
      <textarea class="form__message__textarea" name="message" required=""></textarea>
    </div>

    <input class="form__submit btn" name="submit" type="submit" value="Send" />
  </fieldset>
</form>
<div class="form__success">

Message sent successfully. Thank you!

</div>
<div class="form__error">

Something went wrong, try refreshing and submitting the form again.

</div>
<?php get_footer(); ?>
