<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@apaoww/oci8', dirname(dirname(__DIR__)) . '/path/to/your/extracted'); 
Yii::setAlias('@imgfrontend', 'http://localhost/parkir/frontend/web/qrcode');
Yii::setAlias('@imgbackend', 'http://localhost/parkir/backend/web/qrcode');
Yii::setAlias('@imageurl', 'http://localhost/parkir/common/qrcode');