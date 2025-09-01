<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Galaicha Nepal - Payment</title>
  <style>
    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f5f9;
      color: #333;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
    }

    h1 {
      font-weight: 600;
      color: #2a7a2a;
      font-style: italic;
      margin-bottom: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      padding: 15px;
      width: 100%;
      max-width: 1200px;
      background: #2a7a2a;
      color: white;
      border-radius: 10px;
      box-shadow: 0 3px 8px rgb(0 0 0 / 0.2);
    }

    /* Layout */
    .main-wrapper {
      display: flex;
      justify-content: space-between;
      width: 100%;
      max-width: 1200px;
      gap: 20px;
    }

    .container {
      background: #fff;
      flex: 1;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 18px rgb(0 0 0 / 0.1);
    }

    .order-summary {
      background: #fff;
      flex: 0.6;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 18px rgb(0 0 0 / 0.1);
      height: fit-content;
    }

    .order-summary h2 {
      margin-bottom: 15px;
      color: #2a7a2a;
    }

    .order-summary table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }

    .order-summary th,
    .order-summary td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    .order-summary tfoot td {
      font-weight: 700;
      color: #2a7a2a;
    }

    .payment-options {
      display: flex;
      justify-content: space-around;
      margin-bottom: 30px;
    }

    .payment-options label {
      font-weight: 600;
      cursor: pointer;
      padding: 12px 25px;
      background: #e4f0e4;
      border-radius: 25px;
      transition: background-color 0.3s ease;
      user-select: none;
      border: 2px solid transparent;
    }

    .payment-options input[type="radio"] {
      display: none;
    }

    .payment-options input[type="radio"]:checked+label {
      background: #2a7a2a;
      color: white;
      border-color: #2a7a2a;
    }

    form {
      display: none;
      animation: fadeIn 0.4s ease forwards;
    }

    form.active {
      display: block;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    label {
      display: block;
      margin: 12px 0 6px 0;
      font-weight: 500;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 12px 15px;
      border: 1.8px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s ease;
    }

    input[type="submit"],
    button {
      background: #2a7a2a;
      border: none;
      color: white;
      font-weight: 600;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-size: 18px;
      cursor: pointer;
      margin-top: 20px;
      transition: background-color 0.3s ease;
    }

    /* Modal Styling */
    #confirmModal {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    #confirmModal.active {
      display: flex;
    }

    #confirmModal .modal-content {
      background: white;
      padding: 30px 25px;
      border-radius: 15px;
      text-align: center;
      width: 320px;
      box-shadow: 0 8px 25px rgb(0 0 0 / 0.15);
    }

    #confirmModal h3 {
      margin-bottom: 15px;
      color: #2a7a2a;
    }

    #confirmModal button {
      width: 45%;
      font-size: 16px;
      padding: 12px 0;
    }

    #confirmBtn {
      background-color: #2a7a2a;
      margin-right: 10%;
      color: white;
      border-radius: 8px;
      font-weight: 700;
    }

    #cancelBtn {
      background-color: #b93b3b;
      color: white;
      border-radius: 8px;
      font-weight: 700;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .main-wrapper {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>
  <header class="header">
    <h1>Galaicha Nepal - Payment Page</h1>
  </header>

  <div class="main-wrapper">
    <!-- LEFT: Payment Options -->
    <section class="container">
      <h1>Choose Payment Option</h1>

      <div class="payment-options">
        <input type="radio" id="codOption" name="paymentMethod" value="COD" checked />
        <label for="codOption">Cash on Delivery</label>

        <input type="radio" id="esewaOption" name="paymentMethod" value="ESEWA" />
        <label for="esewaOption">E-Sewa</label>
      </div>

      <!-- COD Form -->
      <form id="codForm" action="payment_action.php" method="POST" class="active">
        <input type="hidden" name="payment_method" value="COD" />
        <label for="codName">Full Name</label>
        <input type="text" id="codName" name="oname" required />

        <label for="codPhone">Phone Number</label>
        <input type="tel" id="codPhone" name="ophone" pattern="[0-9+]{10,15}" required />

        <label for="codEmail">Email</label>
        <input type="email" id="codEmail" name="oemail" required />

        <label for="codAddress">Address</label>
        <input type="text" id="codAddress" name="oaddress" required />

        <input type="submit" name="submit" value="Place Order" />
      </form>

      <!-- eSewa Form -->
      <form id="esewaForm" action="payment_action.php" method="POST" style="display:none;">
        <input type="hidden" name="payment_method" value="ESEWA" />
        <label for="esewaName">Full Name</label>
        <input type="text" id="esewaName" name="oname" required />

        <label for="esewaPhone">Phone Number</label>
        <input type="tel" id="esewaPhone" name="ophone" pattern="[0-9+]{10,15}" required />

        <label for="esewaEmail">Email</label>
        <input type="email" id="esewaEmail" name="oemail" required />

        <label for="esewaAddress">Address</label>
        <input type="text" id="esewaAddress" name="oaddress" required />

        <button type="button"  id="esewaPayBtn">Pay with eSewa</button>
      </form>
    </section>

    <!-- RIGHT: Order Summary -->
    <aside class="order-summary">
      <h2>Order Summary</h2>
      <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Price (Rs.)</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
              echo "<tr>
                      <td>{$item['p_name']}</td>
                      <td>1</td>
                      <td>{$item['p_price']}</td>
                    </tr>";
              $total += $item['p_price'];
            }
          } else {
            echo "<tr><td colspan='3'>No items in cart</td></tr>";
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2">Total</td>
            <td>Rs. <?php echo $total; ?></td>
          </tr>
        </tfoot>
      </table>
    </aside>
  </div>

  <!-- Confirmation Modal -->
  <div id="confirmModal">
    <div class="modal-content">
      <h3>Confirm Payment</h3>
      <p>Do you want to proceed with eSewa payment?</p>
      <button id="confirmBtn">Confirm</button>
      <button id="cancelBtn">Cancel</button>
    </div>
  </div>

  <script>
    const codOption = document.getElementById('codOption');
    const esewaOption = document.getElementById('esewaOption');
    const codForm = document.getElementById('codForm');
    const esewaForm = document.getElementById('esewaForm');
    const esewaPayBtn = document.getElementById('esewaPayBtn');
    const confirmModal = document.getElementById('confirmModal');
    const confirmBtn = document.getElementById('confirmBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    function togglePaymentForm() {
      if (codOption.checked) {
        codForm.classList.add('active');
        codForm.style.display = 'block';
        esewaForm.style.display = 'none';
        esewaForm.classList.remove('active');
      } else if (esewaOption.checked) {
        esewaForm.style.display = 'block';
        esewaForm.classList.add('active');
        codForm.style.display = 'none';
        codForm.classList.remove('active');
      }
    }

    codOption.addEventListener('change', togglePaymentForm);
    esewaOption.addEventListener('change', togglePaymentForm);

    esewaPayBtn.addEventListener('click', () => {
      confirmModal.classList.add('active');
    });

    confirmBtn.addEventListener('click', () => {
      confirmModal.classList.remove('active');
      esewaForm.submit();
    });

    cancelBtn.addEventListener('click', () => {
      confirmModal.classList.remove('active');
    });
  </script>
</body>

</html>
