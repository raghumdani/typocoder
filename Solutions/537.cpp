#include<bits/stdc++.h>
using namespace std;

vector<pair<long long, long long> > v;

void populateV()
{
    v.push_back(make_pair(0, 0));
    v.push_back(make_pair(1, 3));
    long long x = 4;
    bool turn = 1;
    while(x <= 1e15)
    {
        if(turn)
        {
            v.push_back(make_pair(x, x + x - 1));
            x = x + x;
            turn = !turn;
        }
        else
        {
            v.push_back(make_pair(x, x + x + x + x - 1));
            x = x + x + x + x;
            turn = !turn;
        }
    }
}

int main()
{
    long long x;
    int t;
    scanf("%d", &t);
    populateV();
    while(t--)
    {
        scanf("%lld", &x);
        for(int i = 0; i < (int)v.size(); i++)
        {
            if(v[i].first <= x && v[i].second >= x)
            {
                if(i & 1)
                    printf("Alice\n");
                else
                    printf("Bob\n");
                break;
            }
        }
    }
    return 0;
}
