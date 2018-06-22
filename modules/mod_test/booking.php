<?php
    setTitle( "ระบบจองตั๋วดูฟุตบอลโลก" );
?>

<div class="container content-section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <img src="images/db_relation.jpg" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>อธิบาย Database</h1>
            <dl>
                <dt>Table season</dt>
                <dd> - สำหรับเก็บข้อมูลฤดูกาล</dd>
                <dt>Table zone</dt>
                <dd> - สำหรับเก็บข้อมูล โซนพื้นที่</dd>
                <dt>Table seat</dt>
                <dd> - สำหรับเก็บข้อมูล ที่นั่ง และจะมีการอ้างถึง Zone ด้วย</dd>
                <dt>Table match_tb</dt>
                <dd> - สำหรับเก็บข้อมูล แมตช์การแข่งขัน จะมี Field ที่อ้างถึง ฤดูกาล และข้อมูลของ Team ที่ลงแข่ง</dd>
                <dt>Table set_price</dt>
                <dd> - สำหรับตั้งราคา ตั๋ว ที่จำหน่าย โดยจะอ้างอิงจาก Zone และ Match การแข่งขันนั้น ๆ</dd>
                <dt>Table booking</dt>
                <dd> - สำหรับเก็บข้อมูลการจองที่นั่ง</dd>
                <dt>Table stadium</dt>
                <dd> - สำหรับเก็บข้อมูลที่นั่งที่เปิดจำหน่าย</dd>
            </dl>

            <h1>อธิบายระบบ</h1>
            <p> - เมื่อมีการเปิดสำรองที่นั่ง ระบบ จะทำการ List รายการที่นั่งที่สามารถใช้ได้้จากตาราง seat มาใส่ในตาราง stadium เพื่อให้ user ดูข้อมูลต่อไป</p>
            <p> - user ทำการเลือก match ที่ต้องการสำรองที่นั่งก่อน โดยข้อมูลจะอ้้างอิงจากตาราง match</p>
            <p> - เมื่อ user เข้ามาทำการจอง ระบบ จะหาข้อมูลตาราง stadium มาที่ว่างอยู่มาให้ user เลือก</p>
            <p> - หากมี รายการจองที่ไม่ได้ชำระเงินเกินเวลาที่กำหนด ระบบจะ update ที่นั่ง ให้กลายเป็นที่ว่างด้วย</p>
            <p> - เมื่อ user เลือกรายการที่นั่งได้แล้วระบบจะบันทึกข้อมูลที่ตาราง booking พร้้อมทั้ง เปลี่ยนสถานะที่นั่งใน stadium ให้เป็น ไม่ว่าง</p>
            <p> - ในตาราง booking ราคาจะถูกระบุเป็นค่าคงที่ ซึ่งได้ข้อมูลมาจากตาราง set_price</p>
        </div>
    </div>
</div>