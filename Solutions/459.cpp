#include "bits/stdc++.h"
using namespace std;
#define ll long long int

vector < pair< ll, ll > > v;

int main()
{
    ll L = 1;
    ll R = 3;
    v.push_back({L, R});
    int i = 2;
    while( R <= 1e15 )
    {
        if( i % 2 == 0)
        {
            L = R + 1;
            R = L*2 - 1;
        }
        else
        {
            L = R + 1;
            R = L*4 - 1;
            v.push_back({L,R});
        }
        i++;
    }

    int t;
    scanf("%d", &t);
    while( t-- )
    {
        ll x;
        scanf("%lld", &x);
        int megh = 0;
        for(auto it : v)
        {
            if(x >= it.first && x <= it.second)
            {
                megh = 1;
                break;
            }
        }
        if(megh)
            printf("Alice\n");
        else
            printf("Bob\n");
    }
    return 0;
}
