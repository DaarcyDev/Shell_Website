<?php

  require 'includes/funciones.php';

  incluirTemplate('circleMenu');

?>

<div class="container">


  <div id="merch" class="merch2">
    <div class="content-merch2">
      <div class="merch2-content-text">
        <div class="title-merch2">
          <h2>merch</h2>
        </div>
      </div>
      <div class="product-merch">
        <div class="img-product">
          <img class="product-img" src="build/img/Shirt-dangerous-potential-balck.webp" />
        </div>
        <div class="content-product">
          <h2>Shout and play forever Shirt</h2>
          <h2>$13 - $16</h2>
          <form class="variations-form">
            <table class="variations">
              <tbody>
                <tr>
                  <th class="label">
                    <label for="Colors">Color</label>
                  </th>
                  <td class="value">
                    <select class="colors" class="" name="attribute_colors">
                      <option value="">Choose an option</option>
                      <option value="Black" selected="selected" class="attached enabled">Black</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th class="label">
                    <label for="sizes">Sizes</label>
                  </th>
                  <td class="value">
                    <select id="sizes" class="sizes" name="attribute_sizes">
                      <option value="">Choose an option</option>
                      <option value="S" class="attached enabled">S</option>
                      <option value="M" class="attached enabled">M</option>
                      <option value="L" selected="selected" class="attached enabled">L</option>
                      <option value="XL" class="attached enabled">XL</option>
                      <option value="2XL" class="attached enabled">2XL</option>
                      <option value="3XL" class="attached enabled">3XL</option>
                      <option value="4XL" class="attached enabled">4XL</option>
                      <option value="5XL" class="attached enabled">5XL</option>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="description">
              <h3>Description</h3>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem officia quia inventore blanditiis similique fuga dolores, 
                laudantium saepe nisi quaerat pariatur. Quam eveniet praesentium cum, qui nobis sit iure reiciendis.
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem officia quia inventore blanditiis similique fuga dolores, 
                laudantium saepe nisi quaerat pariatur. Quam eveniet praesentium cum, qui nobis sit iure reiciendis.
              </p>
            </div>
            <div class="single-variations">
              <div class="quantity">
                <button type="button" onclick="decrementClick()">-</button>
                <h2 id="number">1</h2>
                <button type="button" onclick="incrementClick()">+</button>
              </div>
              <button class="button-add" type="button">Add to cart</button>
            </div>
          </form>
        </div>
      </div>

      <?php incluirTemplate('download'); ?>

      <div class="button-cont">
        <a href="merch.php" class="button"><span class="button_top"> Back</span></a>
      </div>
    </div>
  </div>
</div>
<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>