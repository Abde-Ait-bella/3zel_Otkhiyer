ALTER TABLE `orders` ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ;

ALTER TABLE `product_order` ADD CONSTRAINT `FK_order` FOREIGN KEY (`order_id`) REFERENCES `orders`(`order_id`) ON DELETE CASCADE;

ALTER TABLE `product_order` ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`) ON DELETE CASCADE ;

ALTER TABLE `orders` CHANGE `user_id` `cusomers_id`;


