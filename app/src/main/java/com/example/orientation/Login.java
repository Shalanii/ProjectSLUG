package com.example.orientation;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class Login extends AppCompatActivity {
    private EditText Name;
    private EditText Password;
    private TextView info;
    private CardView Login;
    private CardView GuestLogin;
    private int counter=5;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        Name=(EditText)findViewById(R.id.editTextName);
        Login=(CardView) findViewById(R.id.login);
        GuestLogin=(CardView) findViewById(R.id.guestlogin);

        Login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                validate(Name.getText().toString());
            }
        });
        GuestLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                    openGuestActivity();

            }
        });
    }

    private void validate(String userName){
        if((userName.equals("p0001")) ){
            Intent intent=new Intent(Login.this,MainActivity.class);
            startActivity(intent);
        }
        else if((userName.equals("f001")) ){
            Intent intent=new Intent(Login.this,QR.class);
            startActivity(intent);
        }
    }
    private void  openGuestActivity(){
        Intent intent=new Intent(Login.this,guestlogin.class);
        startActivity(intent);
    }
}



