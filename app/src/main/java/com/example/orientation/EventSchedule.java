package com.example.orientation;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;

public class EventSchedule extends AppCompatActivity {

    CardView score;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_event_schedule);

        score=(CardView)findViewById(R.id.trackAndFeild);
        score.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openscoreActivity();
            }
        });
    }

    public void openscoreActivity(){
        Intent intent = new Intent(EventSchedule.this,TrackandFeild.class);
        startActivity(intent);
    }

}
