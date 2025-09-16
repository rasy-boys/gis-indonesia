<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modern Sidebar Carousel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: #f5f6fa;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    #scene {
      display: flex;
      width: 1000px;
      height: 420px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    /* Left menu */
    #left-zone {
      width: 280px;
      background: #fafafa;
      border-right: 1px solid #eee;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px 0;
    }
    .list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 10px;
      width: 100%;
    }
    .item input[type="radio"] {
      display: none;
    }
    .item label {
      display: block;
      padding: 14px 20px;
      cursor: pointer;
      border-radius: 8px;
      font-weight: 500;
      color: #555;
      transition: all .3s ease;
    }
    .item label:hover {
      background: #f0f0f0;
    }
    .item input[type="radio"]:checked + label {
      background: #4a90e2;
      color: #fff;
    }

    /* Right content */
/* Right content */
.content {
  position: absolute;
  top: 0;
  left: 280px;   /* ini geser supaya nempel tepat setelah menu kiri */
  right: 0;      /* biar lebarnya otomatis sampai ujung kanan */
  bottom: 0;     /* biar tingginya full */
  
  opacity: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 40px;
  text-align: center;
  transition: all .6s ease;
}

    .item input[type="radio"]:checked ~ .content {
      opacity: 1;
      transform: translateY(0);
      z-index: 1;
    }
    .content h1 {
      margin-bottom: 16px;
      font-size: 28px;
      font-weight: 600;
      color: #333;
    }
    .content p {
  font-size: 15px;
  line-height: 1.6;
  color: #666;
  max-width: 80%;
  margin: 0 auto;   /* 👈 ini bikin dia ke tengah */
  padding: 0 30px;
  box-sizing: border-box;
}


  </style>
</head>
<body>
  <div id="scene">
    <div id="left-zone">
      <ul class="list">
        <li class="item">
          <input type="radio" id="strawberry" name="fruit" checked>
          <label for="strawberry">Strawberry</label>
          <div class="content">
            <h1>Strawberry</h1>
            <p>The garden strawberry is a widely grown hybrid species of the genus Fragaria.</p>
          </div>
        </li>
        <li class="item">
          <input type="radio" id="banana" name="fruit">
          <label for="banana">Banana</label>
          <div class="content">
            <h1>Banana</h1>
            <p>A banana is an edible fruit produced by several kinds of large herbaceous plants in the genus Musa.</p>
          </div>
        </li>
        <li class="item">
          <input type="radio" id="apple" name="fruit">
          <label for="apple">Apple</label>
          <div class="content">
            <h1>Apple</h1>
            <p>The apple tree is cultivated worldwide and is the most widely grown species in the genus Malus.</p>
          </div>
        </li>
        <li class="item">
          <input type="radio" id="orange" name="fruit">
          <label for="orange">Orange</label>
          <div class="content">
            <h1>Orange</h1>
            <p>The sweet orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae.</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</body>
</html>
