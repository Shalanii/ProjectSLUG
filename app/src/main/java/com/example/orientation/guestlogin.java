package com.example.orientation;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;

public class guestlogin extends AppCompatActivity {

    CardView schedule;
    CardView rank;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_guestlogin);

        schedule=(CardView)findViewById(R.id.EventSchedule);
        schedule.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openScheduleActivity();
            }
        });

        rank=(CardView)findViewById(R.id.UniversityRanking);
        rank.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openRankActivity();
            }
        });
    }

    public void openScheduleActivity () {
        Intent intent = new Intent(guestlogin.this, EventSchedule.class);
        startActivity(intent);
    }
    public void openRankActivity(){
        Intent intent=new Intent(guestlogin.this,Ranking.class);
        startActivity(intent);
    }
}
