#include <bits/stdc++.h>
using namespace std;
#define f(i,n) for(i=0;i<n;i++)
int main(){
vector <bool> a(1000000000000000);

    a[0]=0;
    a[1]=1;
    a[2]=1;
    a[3]=1;
    a[4]=0;
    a[5]=0;
    long long  i,z;
    for(i=4;i<100000000;i++)
    {
        if(a[i]==0)
        {z=i;
           a[i*2+1]=1;
           a[i*2]=1;
            a[i*3]=1;
            a[i*3+1]=1;
            a[i*3+2]=1;
        a[i*4]=1;
          a[i*4+3]=1;
          a[i*4+2]=1;
          a[i*4+1]=1;
          if(a[z+1])
          {
              i=i*4+1;
          }
        }
    }    
    int t;
    long long x;
    cin>>t;
    while(t--)
    {
        cin>>x;
        if(a[x])
        {
            cout<<"ALICE\n";
        }
        else
        {
            cout<<"BOB\n";
        }
    }
    
    
    
    
	return 0;
}
