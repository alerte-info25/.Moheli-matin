<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue sur Moheli matin</title>
  <style>
    :root {
      --primary-yellow: #FDB913;
      --dark-yellow: #E5A50A;
      --light-yellow: #FED766;
      --primary-blue: #003DA5;
      --dark-blue: #002D7A;
      --light-blue: #0051D5;
      --primary-red: #E31E24;
      --dark-red: #C41E3A;
      --white: #FFFFFF;
      --off-white: #FAFBFC;
      --light-gray: #F5F7FA;
      --medium-gray: #E4E7EB;
      --text-dark: #1A1A1A;
      --text-light: #6B7280;
    }
    
    @media only screen and (max-width: 600px) {
      table {
        width: 100% !important;
      }
      .mobile-padding {
        padding: 20px !important;
      }
    }
  </style>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background:var(--light-gray);">

  <table align="center" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; margin:auto; background:var(--white); border-radius:8px; overflow:hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <!-- Header -->
    <tr>
      <td align="center" bgcolor="var(--primary-blue)" style="padding:30px; color:var(--white);">
        <h1 style="margin:0; font-size:28px; font-weight:bold;">Moheli matin</h1>
        <p style="margin:5px 0 0; font-size:16px; color:var(--light-yellow);">Plateforme numérique intégrée</p>
      </td>
    </tr>

    <!-- Welcome Message -->
    <tr>
      <td class="mobile-padding" style="padding:30px; text-align:center;">
        <h2 style="color:var(--primary-blue); margin-bottom:20px;">Bienvenue {{ $user->prenom }} {{ $user->nom }} !</h2>
        <p style="color:var(--text-dark); font-size:15px; line-height:1.6;">
          Nous sommes ravis de vous accueillir dans la communauté <strong style="color:var(--primary-blue);">Moheli matin</strong>.<br>
          Votre aventure musicale et médiatique commence maintenant !
        </p>
      </td>
    </tr>

    <!-- User Information -->
    <tr>
      <td class="mobile-padding" style="padding:25px 30px; background:var(--off-white); border-left: 4px solid var(--primary-yellow);">
        <h3 style="margin-top:0; font-size:16px; color:var(--text-dark); margin-bottom:15px;">Vos informations</h3>
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td width="30%" style="padding:5px 0; color:var(--text-light);"><strong>Date :</strong></td>
            <td style="padding:5px 0; color:var(--text-dark);">{{ now()->format('d/m/Y à H:i') }}</td>
          </tr>
          <tr>
            <td style="padding:5px 0; color:var(--text-light);"><strong>Email :</strong></td>
            <td style="padding:5px 0; color:var(--text-dark);">{{ $user->email }}</td>
          </tr>
          <tr>
            <td style="padding:5px 0; color:var(--text-light);"><strong>Genre :</strong></td>
            <td style="padding:5px 0; color:var(--text-dark);">{{ $user->genre->libelle }}</td>
          </tr>
          @if($user->localite)
          <tr>
            <td style="padding:5px 0; color:var(--text-light);"><strong>Localité :</strong></td>
            <td style="padding:5px 0; color:var(--text-dark);">{{ $user->localite->libelle }}</td>
          </tr>
          @endif
        </table>
      </td>
    </tr>

    <!-- Call to Action -->
    <tr>
      <td class="mobile-padding" align="center" style="padding:30px;">
        <p style="font-size:16px; color:var(--text-dark); margin-bottom:20px;">Découvrez toutes les fonctionnalités de votre compte :</p>
        <a href="{{ url('/') }}" 
           style="display:inline-block; background:var(--primary-blue); color:var(--white); padding:12px 30px; text-decoration:none; border-radius:4px; font-weight:bold; transition: background-color 0.3s;"
           onmouseover="this.style.backgroundColor='var(--dark-blue)'" 
           onmouseout="this.style.backgroundColor='var(--primary-blue)'">
            Découvrir Moheli matin
        </a>
      </td>
    </tr>

    <!-- Footer -->
    <tr>
      <td align="center" bgcolor="var(--text-dark)" style="padding:20px; color:var(--medium-gray); font-size:12px; line-height:1.5;">
        © {{ date('Y') }} Moheli matin — COMORES <br>
        <span style="color:var(--text-light); font-size:11px;">Plateforme numérique intégrée</span>
      </td>
    </tr>
  </table>

</body>
</html>