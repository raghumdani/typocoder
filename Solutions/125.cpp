  #include <stdio.h>

int main()
{
    int prime[100000]={0};
    long int T,N,i,j;
    prime[1]=prime[0]=1;
    for(i=4;i<=100000;i+=2)
        prime[i]=1;
    for(i=3;i*i<=100000;i+=2)
    {
        if(!prime[i])
        {
            for(j=i*i;j<=100000;j+=i)
                prime[j]=1;
        }
    }
    scanf("%ld",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%ld",&N);
        if(!prime[N])
            printf("YES\n");
        else
            printf("NO\n");
    }

}
