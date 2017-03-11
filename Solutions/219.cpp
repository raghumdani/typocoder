#include <bits/stdc++.h>
using namespace std;

bool prime[4000000];
void Sieve(long long n)
{
    memset(prime, true, sizeof(prime));
 
    for (long long p=2;p*p<=n;p++)
    {
        if (prime[p]==true)
        {
            for (long long i=p*2;i<=n;i += p)
                prime[i]=false;
        }
    }
}

int main() {
    int odd=0;
    int arr[27];
    long long sum=0,x=0;
    for(int i=0;i<26;i++)
    {
        cin>>arr[i];
        sum+=arr[i];
        if(arr[i]%2!=0)
        {odd++;
        x=i;}
        
    }
    int s[sum]={0};
    if(odd>=2)
    {
      printf("-1\n"); 
      return 0;
    }
    else
    {
        long long c=0;
        if(odd==1)
        {
            s[sum/2]=x;
        }
        for(long long i=0;i<26;i++)
        {
            while(arr[i]>0)
            {
                s[c]=i;
                s[sum-c-1]=i;
                arr[i]-=2;
                c++;
            }
        }
    }
    for(long long i=0;i<sum;i++)
    {
        long long x=s[i]+97;
        printf("%c",x);
    }
	// your code goes here
	return 0;
}
